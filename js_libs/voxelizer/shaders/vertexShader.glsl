
  attribute vec3 aVertexPosition;
  attribute vec3 aNormalPosition;
  attribute vec2 aTexturePosition;
  attribute vec4 aColor;

  uniform   mat4 uPMatrix;
  uniform   mat4 uMVMatrix;
  uniform   mat3 uNMatrix;

  varying   vec3 vVertexPosition;
  varying   vec3 vNormalPosition;
  varying   vec2 vTexturePosition;
  varying   vec4 vColor;


  
  void main(void) {
   vec4  vertexPosition;

   vertexPosition   = uMVMatrix * vec4( aVertexPosition, 1.0 );
   vVertexPosition  = vertexPosition.xyz / vertexPosition.w ;
   vNormalPosition  = normalize( uNMatrix * aNormalPosition  );
   vTexturePosition = aTexturePosition;
   vColor           = aColor;

   gl_Position      = uPMatrix * vertexPosition;



  }
