<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">


</head>
<body>
<script src="three.js"></script>
<script src="TrackballControls.js"></script>
<script src="PDBLoader.js"></script>
<script src="CSS2DRenderer.js"></script>


<div id="container" style="width:256px; height:256px; background:#f00; margin:200px">
    <canvas id="myCanvas" style="height: 256px; width: background:#0f0;"></canvas>
</div>



<script>

    var camera, scene, renderer, labelRenderer;
    var controls;

    var root;

    var loader = new THREE.PDBLoader();

    var menu = document.getElementById( 'menu' );

    init();
    animate();

    function init() {

        scene = new THREE.Scene();

        camera = new THREE.PerspectiveCamera( 45, window.innerWidth / window.innerHeight, 0.5, 2000 );
        camera.position.z = 1000;
        scene.add( camera );

        var light = new THREE.DirectionalLight( 0xffffff, 0.8 );
        light.position.set( 1, 1, 1 );
        scene.add( light );

        var light = new THREE.DirectionalLight( 0xffffff, 0.5 );
        light.position.set( -1, -1, 1 );
        scene.add( light );

        root = new THREE.Group();
        scene.add( root );

        var myCanvas = document.getElementById("myCanvas");

        renderer = new THREE.WebGLRenderer( { canvas: myCanvas, antialias: true } );

        renderer.setPixelRatio( window.devicePixelRatio );
        renderer.setSize( 256, 256); //window.innerWidth, window.innerHeight );
        //document.getElementById( 'container' ).appendChild( renderer.domElement );
        //console.log("renderer.domElement", renderer.domElement );

        labelRenderer = new THREE.CSS2DRenderer();
        labelRenderer.setSize( 256, 256); //window.innerWidth, window.innerHeight );
        labelRenderer.domElement.style.position = 'absolute';
        labelRenderer.domElement.style.top = '180px';
        labelRenderer.domElement.style.pointerEvents = 'none';

        document.getElementById( 'container' ).appendChild( labelRenderer.domElement );


        controls = new THREE.TrackballControls( camera, renderer.domElement );
        controls.minDistance = 200;
        controls.maxDistance = 2000;

        loadMolecule( '../../assets/molecules/ethylene.pdb' );
    }


    function loadMolecule( url ) {

        // Clear Previous
        while ( root.children.length > 0 ) {
            var object = root.children[ 0 ];
            object.parent.remove( object );
        }

        // Load new
        loader.load( url, function ( pdb ) {

            var geometryAtoms = pdb.geometryAtoms;
            var geometryBonds = pdb.geometryBonds;
            var json = pdb.json;

            var boxGeometry = new THREE.BoxBufferGeometry( 1, 1, 1 );
            var sphereGeometry = new THREE.IcosahedronBufferGeometry( 1, 2 );

            var offset = geometryAtoms.center();
            geometryBonds.translate( offset.x, offset.y, offset.z );

            var positions = geometryAtoms.getAttribute( 'position' );
            var colors = geometryAtoms.getAttribute( 'color' );

            var position = new THREE.Vector3();
            var color = new THREE.Color();

            for ( var i = 0; i < positions.count; i ++ ) {

                // Make the atoms
                position.x = positions.getX( i );
                position.y = positions.getY( i );
                position.z = positions.getZ( i );

                color.r = colors.getX( i );
                color.g = colors.getY( i );
                color.b = colors.getZ( i );

                var material = new THREE.MeshPhongMaterial( { color: color } );

                var object = new THREE.Mesh( sphereGeometry, material );
                object.position.copy( position );
                object.position.multiplyScalar( 75 );
                object.scale.multiplyScalar( 25 );
                root.add( object );

                // Make the label of the atom
                var atom = json.atoms[ i ];

                var text = document.createElement( 'div' );
                text.className = 'label';
                text.style.color = 'rgb(' + atom[ 3 ][ 0 ] + ',' + atom[ 3 ][ 1 ] + ',' + atom[ 3 ][ 2 ] + ')';
                text.textContent = atom[ 4 ];

                var label = new THREE.CSS2DObject( text );
                label.position.copy( object.position );
                root.add( label );

            }

            // Make the bonds
            positions = geometryBonds.getAttribute( 'position' );

            var start = new THREE.Vector3();
            var end = new THREE.Vector3();

            for ( var i = 0; i < positions.count; i += 2 ) {

                start.x = positions.getX( i );
                start.y = positions.getY( i );
                start.z = positions.getZ( i );

                end.x = positions.getX( i + 1 );
                end.y = positions.getY( i + 1 );
                end.z = positions.getZ( i + 1 );

                start.multiplyScalar( 75 );
                end.multiplyScalar( 75 );

                var object = new THREE.Mesh( boxGeometry, new THREE.MeshPhongMaterial( 0xffffff ) );
                object.position.copy( start );
                object.position.lerp( end, 0.5 );
                object.scale.set( 5, 5, start.distanceTo( end ) );
                object.lookAt( end );
                root.add( object );

            }

            render();

        } );

    }


    function animate() {

        requestAnimationFrame( animate );
        controls.update();
        render();

    }

    function render() {

        renderer.render( scene, camera );
        labelRenderer.render( scene, camera );

    }

</script>
</body>
</html>
