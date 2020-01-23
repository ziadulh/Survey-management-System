<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>

        <ul class="sidebar-menu" data-widget="tree">

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-circle-o"></i> <span>Survey</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">
                    {{--land class--}}
                    <li class="treeview">
                        <a href="#"><i class="fa fa-circle-o"></i> Syrvey Class
                            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="/createSurvey"><i class="fa fa-circle-o"></i>Create Survey</a></li>
                            <li><a href="/surveyList"><i class="fa fa-circle-o"></i> Survey List</a></li>
                        </ul>
                    </li>



                    <li class="treeview">
                        <a href="#"><i class="fa fa-circle-o"></i>Questionaire Class
                            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="/survey/questionaire"><i class="fa fa-circle-o"></i>Create Survey Question </a></li>
                            <li><a href="/allSurveyQuestionList"><i class="fa fa-circle-o"></i>All Survey Questionaire</a></li>

                        </ul>
                    </li>


                    <li class="treeview">
                        <a href="#"><i class="fa fa-circle-o"></i> Profession Class
                            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="/surveyProfessionCreatorForm"><i class="fa fa-circle-o"></i>Create Profession</a></li>
                            <li><a href="/surveyProfessionList"><i class="fa fa-circle-o"></i>Survey Profession List</a></li>

                        </ul>
                    </li>
            </li>

        </ul>


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-circle-o"></i> <span>Admin</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">
                    {{--land class--}}
                    <li class="treeview">
                        <a href="#"><i class="fa fa-circle-o"></i> Registration Class
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>

                        <ul class="treeview-menu">
                            <li><a href="/register"><i class="fa fa-circle-o"></i> Register</a></li>
                        </ul>
                    </li>


                    <li class="treeview">
                        <a href="#"><i class="fa fa-circle-o"></i> Report Class
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>

                        <ul class="treeview-menu">
                            <li><a href="/surveyReport"><i class="fa fa-circle-o"></i> General Report</a></li>
                            <li><a href="/professionwise/surveyReport"><i class="fa fa-circle-o"></i> Professionwise Report</a></li>
                        </ul>
                    </li>
                </ul>
            </li>


    </section>
    <!-- /.sidebar -->
</aside>
