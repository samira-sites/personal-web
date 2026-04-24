@echo off
for %%i in (*.png) do (
cwebp -q 80 "%%i" -o "%%~ni.webp"
)
echo Done converting images!
pause