function generateMultiLineString( lines, separator, padding ) {

    var cleanLines = [];

    for ( var i = 0; i < lines.length; i ++ ) {

        var line = lines[ i ];

        if ( line ) {

            if ( padding ) line = PaddingString( padding ) + line;
            cleanLines.push(  line );

        }

    }

    return cleanLines.join( separator );

}

function getObjectName( o ) {

    return o.name ? o.name : "Object_" + o.id;

}

function getGeometryName( g ) {

    return g.name ? g.name : "Geometry_" + g.id;

}

function getMaterialName( m ) {

    return m.name ? m.name : "Material_" + m.id;

}

function getTextureName( t ) {

    return t.name ? t.name : "Texture_" + t.id;

}

function getFogName( f ) {

    return f.name ? f.name : "Default fog";

}


function Vector2String( v ) {

    return "[" + v.x + "," + v.y + "]";

}

function Vector3String( v ) {

    return "[" + v.x + "," + v.y + "," + v.z + "]";

}


function ColorString( c ) {

    return "[" + c.r.toFixed( 3 ) + "," + c.g.toFixed( 3 ) + "," + c.b.toFixed( 3 ) + "]";

}

function LabelString( s ) {

    return '"' + s + '"';

}

function NumConstantString( c ) {

    var constants = [ "NearestFilter", "NearestMipMapNearestFilter" , "NearestMipMapLinearFilter",
        "LinearFilter", "LinearMipMapNearestFilter", "LinearMipMapLinearFilter" ];

    for ( var i = 0; i < constants.length; i ++ ) {

        if ( THREE[ constants[ i ] ] === c )
            return LabelString( constants[ i ] );

    };

    return "";

}

function PaddingString( n ) {

    var output = "";

    for ( var i = 0; i < n; i ++ ) output += "\t";

    return output;

}
