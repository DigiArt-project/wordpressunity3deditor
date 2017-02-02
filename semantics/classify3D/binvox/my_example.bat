REM dos
REM we get the android.binvox with 64x64x64 dimensions, run binvox.exe -help for all parameters
binvox.exe -d 64 -e android.obj

REM optional : view it (-ki keep internal voxels)
viewvox.exe -ki android.binvox

python binvox_to_python3darray.py android.binvox

pause