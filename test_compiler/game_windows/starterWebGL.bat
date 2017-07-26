set mypath=%cd%
@echo %mypath%
"C:\Program Files\Unity\Editor\Unity.exe" -quit -batchmode -logFile stdout.log -projectPath %mypath% -executeMethod WebGLBuilder.build