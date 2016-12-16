// window or document ???

window.addEventListener( 'mousedown', function ( event ) {

    if (avatarControlsEnabled) {
        switch (event.button) {
            case 0:
                moveForward = true;
                break;
            case 2:
                moveBackward = true;
                break;
        }
    }

}, true);


window.addEventListener( 'mouseup', function ( event ) {

    if (avatarControlsEnabled) {
        switch (event.button) {
            case 0:
                moveForward = false;
                break;
            case 2:
                moveBackward = false;
                break;
        }
    }


}, true);


window.addEventListener( 'wheel', function ( event ) {

    if (avatarControlsEnabled)
        if (event.deltaY)
            if (event.deltaY>0)
                moveUp = true;
            else
                moveDown = true;

}, true);




window.addEventListener( 'keydown',
    function ( event ) {

        switch ( event.keyCode ) {
            //---------------------------- TRS ---------------------------------------

            case 84: // T
                transform_controls.setMode("translate");
                break;
            case 85: // Y
                transform_controls.setMode("rotate");
                break;
            case 86: // U
                transform_controls.setMode("scale");
                break;
            case 187:
            case 107: // +,=,num+
                transform_controls.setSize(transform_controls.size + 0.1);
                break;
            case 189:
            case 10: // -,_,num-
                transform_controls.setSize(Math.max(transform_controls.size - 0.1, 0.1));
                break;
            //-------------------------------- PointerLock -----------------------
            case 38: // up arrow
            case 87: // w
                
                moveForward = true;
                break;

            case 37: // left
            case 65: // a
                moveLeft = true;
                break;

            case 40: // down
            case 83: // s
                moveBackward = true;
                break;

            case 39: // right
            case 68: // d
                moveRight = true;
                break;

            case 81: // Q
                moveUp = true;

                break;
            case 69: // E
                moveDown = true;
                break;

            case 32: // space
            case 96: // 0

                //// in avatar mode = jump whearas in orbitmode changes trs mode
                ////if (avatarControlsEnabled) {
                //    if (canJump === true) velocity.y += 150;
                //    canJump = false;
                ////}else {
                ////    if (transform_controls.getMode() == 'rotate')
                ////        transform_controls.setMode("scale");
                ////    else if (transform_controls.getMode() == 'scale')
                ////        transform_controls.setMode("translate");
                ////    else if (transform_controls.getMode() == 'translate')
                ////        transform_controls.setMode("rotate");
                ////}

                break;
            //-----------------------------------------------------------------
        }
});


window.addEventListener( 'keyup',

        function ( event ) {

            switch( event.keyCode ) {

                case 38: // up
                case 87: // w
                    moveForward = false;
                    break;

                case 37: // left
                case 65: // a
                    moveLeft = false;
                    break;

                case 40: // down
                case 83: // s
                    moveBackward = false;
                    break;

                case 39: // right
                case 68: // d
                    moveRight = false;
                    break;

                case 69: // e
                    moveDown = false;
                    break;

                case 81: // e
                    moveUp = false;
                    break;

            }

        }, false );





