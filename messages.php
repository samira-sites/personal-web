<?php
include 'config.php';

// DELETE (safe)
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $stmt = $conn->prepare("DELETE FROM form WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

// SEARCH (safe)
$search = $_GET['search'] ?? '';
$stmt = $conn->prepare("
    SELECT * FROM form 
    WHERE name LIKE ? OR email LIKE ? OR message LIKE ?
    ORDER BY id DESC
");

$like = "%$search%";
$stmt->bind_param("sss", $like, $like, $like);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
<title>Messages</title>

<style>
:root {
  --primary:  #fe9c0a;
  --bg: #0b0f1a;
  --text: #000
}

body {
  font-family: Arial;
  background: var(--bg);
  padding: 20px;
  color: var(--text);
}

/* Header */
.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 25px;
  flex-wrap: wrap;
  gap: 10px;
}

h2 {
  color: var(--primary);
}

/* Search */
.search-box input {
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 8px;
}

.search-box button {
  padding: 10px;
  background: var(--primary);
  color: var(--text);
  border: none;
  border-radius: 8px;
  cursor: pointer;
}

/* Refresh */
.refresh {
  text-decoration: none;
  font-size: 14px;
  color: var(--primary);
}

/* Table */
.table-container {
  overflow-x: auto;
  background: white;
  border-radius: 15px;
  box-shadow: 0 10px 30px rgba(0,0,0,0.05);
  padding: 10px;
}

table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  padding: 14px;
  text-align: left;
}

td {
  max-width: 200px;
  word-wrap: break-word;
}

th {
  background: var(--primary);
  color: var(--text);
}

tr {
  border-bottom: 1px solid #eee;
}

tr:hover {
  background: #fff0f5;
}

/* Delete button */
.delete {
  color: white;
  background: #ff4d6d;
  padding: 6px 10px;
  border-radius: 6px;
  text-decoration: none;
  font-size: 12px;
}

.delete:hover {
  background: #e63950;
}

/* Empty state */
.empty {
  text-align: center;
  padding: 20px;
  color: #888;
}

/* Responsive */
@media(max-width: 768px) {
  table {
    font-size: 12px;
  }
}
</style>

</head>
<body>

<div class="header">
  <h2>📩 Contact Messages</h2>

  <div>
    <form class="search-box" method="GET" style="display:inline;">
      <input type="text" name="search" placeholder="Search..." value="<?= htmlspecialchars($search) ?>">
      <button>Search</button>
    </form>

    <a class="refresh" href="messages.php">🔄 Refresh</a>
  </div>
</div>

<div class="table-container">

<p><strong>Total Messages:</strong> <?= $result->num_rows ?></p>

<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Message</th>
<th>Date</th>
<th>Action</th>
</tr>

<?php if ($result->num_rows === 0): ?>
<tr>
  <td colspan="7" class="empty">No messages found 💌</td>
</tr>
<?php endif; ?>

<?php while($row = $result->fetch_assoc()): ?>
<tr>
<td><?= $row['id'] ?></td>
<td><?= htmlspecialchars($row['name']) ?></td>
<td><?= htmlspecialchars($row['email']) ?></td>

<td>
<?= strlen($row['message']) > 50 
    ? htmlspecialchars(substr($row['message'], 0, 50)) . '...' 
    : htmlspecialchars($row['message']) ?>
</td>

<td><?= $row['created_at'] ?? '—' ?></td>

<td>
<a class="delete" 
   href="?delete=<?= $row['id'] ?>" 
   onclick="return confirm('Are you sure you want to delete this message?')">
   Delete
</a>
</td>
</tr>
<?php endwhile; ?>

</table>
</div>

</body>
</html>

<?php $conn->close(); ?>