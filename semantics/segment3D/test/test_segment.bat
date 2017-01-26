@echo off
..\pclTesting.exe "test_segment.obj" "100" "0.01" "0.2" "100" "25000"
del "*.pcd"
del "barycenters.txt"