
  #ifdef GL_FRAGMENT_PRECISION_HIGH
   precision highp float;
  #else
   precision mediump float;
  #endif

  #pragma debug(off)
  #pragma optimize(on) 

  uniform   vec3      uLightPosition;
  uniform   vec3      uLightColor;
  uniform   vec3      uMaterialAmbient;
  uniform   vec3      uMaterialDiffuse;
  uniform   float     uAttenuation;
  uniform   float     uVoxelSize;

  varying   vec3      vVertexPosition;
  varying   vec3      vNormalPosition;
  varying   vec2      vTexturePosition;
  varying   vec4      vColor;
  

  //***************************************************************************
  //                                                                          
  //***************************************************************************

  void main(void) {
   float x, y, a, dis, minDis;
   float ambient, diffuse, rdotv, spc, attenuation;
   vec3  vectorToLight, reflection;
   vec3  color, matColor; 

   spc            = length( uLightPosition - vVertexPosition );
   attenuation    = 1.0 / ( 1.0 + uAttenuation + ( uAttenuation * spc ) + ( uAttenuation * spc * spc ) );
   vectorToLight  = normalize( uLightPosition - vVertexPosition );
   diffuse        = max( dot( normalize( vNormalPosition ), vectorToLight ), 0.0 );
   reflection     = normalize( reflect( -vectorToLight, normalize( vNormalPosition ) ) );
   rdotv          = max( dot( reflection, vec3( 0.0, 0.0, 1.0 ) ), 0.0 );

   matColor = vColor.xyz / 255.0;
 
   //**************************************************************************
   // ambient occlusion type
   //*************************************************************************

   minDis   = 1.0;
   matColor = vColor.xyz / 255.0;
   a        = vColor.a + 0.05;
   x        = vTexturePosition.x;
   y        = vTexturePosition.y;

   dis     = sqrt( pow( x, 2.0 ) + pow( y, 2.0 ) ); 
   dis    += 1.0 - mod( floor( a / 1.0 ), 2.0 );
   minDis  = min( minDis, dis ); 

   dis     = sqrt( pow( 1.0 - x, 2.0 ) + pow( y, 2.0 ) );
   dis    += 1.0 - mod( floor( a / 2.0 ), 2.0 );
   minDis  = min( minDis, dis ); 

   dis     = sqrt( pow( 1.0 - x, 2.0 ) + pow( 1.0 - y, 2.0 ) );
   dis    += 1.0 - mod( floor( a / 4.0 ), 2.0 );
   minDis  = min( minDis, dis ); 

   dis     = sqrt( pow( x, 2.0 ) + pow( 1.0 - y, 2.0 ) );
   dis    += 1.0 - mod( floor( a / 8.0 ), 2.0 );
   minDis  = min( minDis, dis ); 


   dis     = y;
   dis    += 1.0 - step( 2.0, ( mod( floor( a / 1.0 ), 2.0 ) + mod( floor( a / 2.0 ), 2.0 ) ) ); 
   minDis  = min( minDis, dis );

   dis     = ( 1.0 - x );
   dis    += 1.0 - step( 2.0, ( mod( floor( a / 2.0 ), 2.0 ) + mod( floor( a / 4.0 ), 2.0  ) ) );
   minDis  = min( minDis, dis );

   dis     = ( 1.0 - y );
   dis    += 1.0 - step( 2.0, ( mod( floor( a / 4.0 ), 2.0 ) + mod( floor( a / 8.0 ), 2.0 ) ) );
   minDis  = min( minDis, dis );

   dis     = ( x );
   dis    += 1.0 - step( 2.0, ( mod( floor( a / 8.0 ), 2.0 ) + mod( floor( a / 1.0 ), 2.0 ) ) );
   minDis  = min( minDis, dis );

   //**************************************************************************
   // correction fully black
   //**************************************************************************

   minDis = min( minDis, 1.0 - step( 15.0, floor( a ) ) );

   //**************************************************************************
   // modify and process intensity
   //**************************************************************************

   minDis  = 0.65 + minDis * 0.35; 
   minDis += ( 1.0 - uVoxelSize ) * ( 1.0 - minDis );




   matColor.x *= minDis;
   matColor.y *= minDis; 
   matColor.z *= minDis; 


   color  = ( uMaterialDiffuse - uMaterialAmbient ) * pow( diffuse, 2.0 );
   color *= matColor * uLightColor * attenuation;
   color += uMaterialAmbient * matColor * uLightColor;

   color  = min( color, 1.0 );

   gl_FragColor = vec4( color, 1.0 );
  }

