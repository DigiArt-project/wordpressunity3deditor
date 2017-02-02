import binvox_rw;
import sys;
import numpy;

# transforms binvox files into boolean 3d array
def binvox_to_python3darray(fname):

	with open(fname, 'rb') as f:
		model = binvox_rw.read_as_3d_array(f);
	
	print(model.data);	
	print(model.dims);
	print(model.scale);
	
	# use numpy.save to save model.data into file
			
if __name__ == "__main__":
	binvox_to_python3darray(sys.argv[1])	
	
	