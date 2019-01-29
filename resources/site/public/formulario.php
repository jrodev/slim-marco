 <!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8"/>
                <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
                <meta name="viewport" content="width=device-width, initial-scale=1"/>

                <title>Odoo</title>
                <link type="image/x-icon" rel="shortcut icon" href="../web/static/src/img/favicon.ico"/>

                <script type="text/javascript">
                    var odoo = {
                        csrf_token: "e39daff92e3ba7789ce7b161c5bddfc38dbae1a4o",
                    };
                </script>


                <script type="text/javascript">
                    odoo.session_info = {"username": "00005119", "currencies": {"1": {"digits": [69, 2], "position": "after", "symbol": "\u20ac"}, "162": {"digits": [69, 2], "position": "before", "symbol": "S/"}, "3": {"digits": [69, 2], "position": "before", "symbol": "$"}}, "uid": 77, "db": "ONIEES", "is_admin": false, "server_version_info": [10, 0, 0, "final", 0, ""], "server_version": "10.0-20170419", "user_context": {"lang": "es_PE", "tz": "America/Lima", "uid": 77}, "web.base.url": "http://oniees.minsa.gob.pe", "name": "SAN RAMON", "partner_id": 78, "company_id": 1, "session_id": "504aa52038c42af5fba4129b4ee05dd01bad1775", "is_superuser": false, "user_companies": false};
                </script>


            <link href="../web/content/246-5887153/web.assets_common.0.css" rel="stylesheet"/>

            <link href="../web/content/28066-a0491ae/web.assets_backend.0.css" rel="stylesheet"/>
            <link href="../web/content/28067-a0491ae/web.assets_backend.1.css" rel="stylesheet"/>

            <link href="../web/content/249-a9c5b54/web_editor.summernote.0.css" rel="stylesheet"/>

            <link href="../web/content/250-3adaf35/web_editor.assets_editor.0.css" rel="stylesheet"/>

            <script  type="text/javascript" src="../web/content/251-5887153/web.assets_common.js"></script>

            <script  type="text/javascript" src="../web/content/28068-a0491ae/web.assets_backend.js"></script>


                    <!--[if lt IE 10]>
                        <body class="ie9">
                    <![endif]-->



            <script  type="text/javascript" src="../web/content/253-a9c5b54/web_editor.summernote.js"></script>

            <script  type="text/javascript" src="../web/content/254-3adaf35/web_editor.assets_editor.js"></script>

        <script type="text/javascript">
            odoo.define('web.web_client', function (require) {
                var WebClient = require('web.WebClient');
                var web_client = new WebClient();
                $(function() {
                    web_client.setElement($(document.body));
                    web_client.start();
                });
                return web_client;
            });
        </script>


            </head>
            <body class="o_web_client">





            <nav id="oe_main_menu_navbar" class="navbar navbar-inverse">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">

        <ul class="nav navbar-nav navbar-left oe_application_menu_placeholder" style="display: none;">
            <li>


        <a href="../web#menu_id=86&amp;action=99" class="oe_menu_leaf" data-menu="86" data-action-model="ir.actions.client" data-action-id="99">
            <span class="oe_menu_text">
                Debates
            </span>
        </a>

            </li><li>


        <a href="../web#menu_id=72&amp;action=78" class="oe_menu_leaf" data-menu="72" data-action-model="ir.actions.act_window" data-action-id="78">
            <span class="oe_menu_text">
                Registro Ficha
            </span>
        </a>

            </li><li>


        <a href="../web#menu_id=70&amp;action=77" class="oe_menu_leaf" data-menu="70" data-action-model="ir.actions.act_window" data-action-id="77">
            <span class="oe_menu_text">
                Establecimiento Salud
            </span>
        </a>

            </li>
            <li id="menu_more_container" class="dropdown" style="display: none;">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Más<b class="caret"></b></a>
                <ul id="menu_more" class="dropdown-menu"></ul>
            </li>
        </ul>

        <ul class="nav navbar-nav navbar-right oe_user_menu_placeholder" style="display: none;"></ul>
        <ul class="nav navbar-nav navbar-right oe_systray" style="display: none;"></ul>

                </div>
            </nav>
            <div class="o_main">
                <div class="o_sub_menu">

        <a class="o_sub_menu_logo" href="../web">
            <span class="oe_logo_edit">Editar información de compañía</span>
            <img src="../web/binary/company_logo"/>
        </a>
        <div class="o_sub_menu_content">

                <div style="display: none" class="oe_secondary_menu" data-menu-parent="86">

                </div>

                <div style="display: none" class="oe_secondary_menu" data-menu-parent="72">

                </div>

                <div style="display: none" class="oe_secondary_menu" data-menu-parent="70">

                </div>

        </div>
        <div class="o_sub_menu_footer">
            Con tecnología de <a href="http://www.odoo.com" target="_blank"><span>Odoo</span></a>
        </div>

                </div>
                <div class="o_main_content"></div>
            </div>

            </body>
        </html>
