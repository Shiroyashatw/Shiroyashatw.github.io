header =


  
'<nav class="mnb navbar navbar-default navbar-fixed-top">\
    <div class="container-fluid">\
      <div class="navbar-header">\
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"\
          aria-expanded="false" aria-controls="navbar">\
          <span class="sr-only">Toggle navigation</span>\
          <i class="ic fa fa-bars"></i>\
        </button>\
        <div style="padding: 15px 0;">\
          <a href="#" id="msbo"><i class="ic fa fa-bars"></i></a>\
        </div>\
      </div>\
      <div id="navbar" class="navbar-collapse collapse">\
        <ul class="nav navbar-nav navbar-right">\
          <!-- <li><a href="#">En</a></li> -->\
          <li class="dropdown">\
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"\
              aria-expanded="false">員工<span class="caret"></span></a>\
            <ul class="dropdown-menu">\
              <li><a href="login.html">登入/註冊</a></li>\
              <li><a href="#">員工設定</a></li>\
              <li role="separator" class="divider"></li>\
              <li><a href="#">登出</a></li>\
            </ul>\
          </li>\
          <li><a href="#"><i class="fa fa-bell-o"></i></a></li>\
          <li><a href="#"><i class="fa fa-comment-o"></i></a></li>\
        </ul>\
        <form class="navbar-form navbar-right">\
          <input type="text" class="form-control" placeholder="Search...">\
        </form>\
      </div>\
    </div>\
  </nav>\
  <!--msb: main sidebar-->\
  <div class="msb" id="msb">\
    <nav class="navbar navbar-default" role="navigation">\
      <!-- Brand and toggle get grouped for better mobile display -->\
      <div class="navbar-header">\
        <div class="brand-wrapper">\
          <!-- Brand -->\
          <div class="brand-name-wrapper">\
            <a class="navbar-brand" href="index.html">\
              若水\
            </a>\
          </div>\
          \
        </div>\
        \
      </div>\
      \
      <!-- Main Menu -->\
      <div class="side-menu-container">\
        <ul class="nav navbar-nav">\
          <li><a href="#">公司公告</a></li>\
          <li><a href="Calendar.html"></i>行事曆</a></li>\
          <!-- Dropdown-->\
          <li class="panel panel-default" id="dropdown">\
            <a data-toggle="collapse" href="#dropdown-lvl1">\
              住補資料\
              <span class="caret"></span>\
            </a>\
            <!-- Dropdown level 1 -->\
            <div id="dropdown-lvl1" class="panel-collapse collapse">\
              <div class="panel-body">\
                <ul class="nav navbar-nav">\
                  <li><a href="Serveindex.html">服務科</a></li>\
                  <li><a href="Correctiontable.html">補正表單</a></li>\
                  <li><a href="Basictable.html">基本規定</a></li>\
                  <!-- Dropdown level 2 -->\
                  <li class="panel panel-default" id="dropdown">\
                    <a data-toggle="collapse" href="#dropdown-lvl2">\
                      社宅\
                      <span class="caret"></span>\
                    </a>\
                    <div id="dropdown-lvl2" class="panel-collapse collapse">\
                      <div class="panel-body">\
                        <ul class="nav navbar-nav">\
                          <li><a href="FUA.html">豐原</a></li>\
                          <li><a href="DLA.html">大里</a></li>\
                          <li><a href="NTA.html">南屯</a></li>\
                          <li><a href="TPA.html">太平</a></li>\
                          <li><a href="WXA.html">梧棲</a></li>\
                          <li><a href="BTA.html">北屯</a></li>\
                          <li><a href="NTA2.html">南屯建功</a></li>\
                        </ul>\
                      </div>\
                    </div>\
                  </li>\
                </ul>\
              </div>\
            </div>\
          </li>\
          <li><a href="#">表單下載</a></li>\
          <li><a href="#">相關連結</a></li>\
          <li><a href="house.html">舊版頁面</a></li>\
        </ul>\
      </div><!-- /.navbar-collapse -->\
    </nav>\
  </div>'
  document.write(header);
