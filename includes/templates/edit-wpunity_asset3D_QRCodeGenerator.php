<?php if (!isset($_GET['qrcode'])){ ?>
    
    <div style="width:180px;position:absolute;bottom:0;right:0;text-align:center;height:200px">
        
        <button id='button_qrcode' class="button_qrcode"  style="bottom:0;right:0;position:absolute;z-index:15;padding:0px;padding-left:3px;padding-right:5px;margin-bottom:5px;font-family: Arial, sans-serif;"
                onclick="toggleQRcode()">
            x
        </button>
        
        <script>
            function toggleQRcode(){

                var dom = document.getElementById('qrcode_div');
                var dombutton = document.getElementById('button_qrcode');

                if(dom.style.display!='none') {
                    dom.style.display = 'none';
                    dombutton.innerText = 'o';
                }else {
                    dom.style.display = 'block';
                    dombutton.innerText = 'x';
                }
            }
        </script>
        
        
        <div id="qrcode_div" style="width:180px;position:absolute;bottom:0;right:0;text-align:center">
            View at your device
            
            <div id="qrcode" style="width: 128px;margin-left: auto;margin-right: auto;text-align: center;margin-top: 10px;margin-bottom: 15px">
            
            </div>
            <script type="text/javascript">
                var qrcode = new QRCode(document.getElementById("qrcode"), {
                    text: window.location.href.replace('#','&qrcode=none#'),
                    width: 128,
                    height: 128,
                    colorDark : "#000000",
                    colorLight : "#ffffff",
                    correctLevel : QRCode.CorrectLevel.H
                });
            </script>
        </div>
    
    </div>
<?php } ?>
