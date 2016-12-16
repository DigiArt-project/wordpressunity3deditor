var output = envir.scene.toJSON();

try {
    output = JSON.stringify( output, null, '\t' );
    output = output.replace( /[\n\t]+([\d\.e\-\[\]]+)/g, '$1' );
} catch ( e ) {
    output = JSON.stringify( output );
}

saveString( output, 'scene.json' );

function save( blob, filename ) {


    var link = document.createElement( 'a' );
    link.style.display = 'none';
    document.body.appendChild( link ); // Firefox workaround, see #6594

    link.href = URL.createObjectURL( blob );
    link.download = filename || 'data.json';
    link.click();

    // URL.revokeObjectURL( url ); breaks Firefox...

}

function saveString( text, filename ) {

    save( new Blob( [ text ], { type: 'text/plain' } ), filename );

}