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
                            <li><a href="/survey/questionaire"><i class="fa fa-circle-o"></i>Create Survey Question </a></li>
                        </ul>
                    </li>



                    <li class="treeview">
                        <a href="#"><i class="fa fa-circle-o"></i>Questionaire
                            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="/allSurveyQuestionList"><i class="fa fa-circle-o"></i>All Survey Questionaire</a></li>
                            <li><a href="/register"><i class="fa fa-circle-o"></i> Register</a></li>

                        </ul>
                    </li>


                    <li class="treeview">
                        {{-- <a href="#"><i class="fa fa-circle-o"></i> Texture --}}
                            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                        </a>
                        <ul class="treeview-menu">
                            {{-- <li><a href="{{route('texture.create')}}"><i class="fa fa-circle-o"></i> Add Texture</a></li> --}}
                            {{-- <li><a href="{{route('texture.index')}}"><i class="fa fa-circle-o"></i> Texture List</a></li> --}}

                        </ul>
                    </li>



                    <li class="treeview">
                        {{-- <a href="#"><i class="fa fa-circle-o"></i> Cultivation Type --}}
                            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                        </a>
                        <ul class="treeview-menu">
                            {{-- <li><a href="{{route('cultivationType.create')}}"><i class="fa fa-circle-o"></i>Add Cultivation Type</a></li> --}}
                            {{-- <li><a href="{{route('cultivationType.index')}}"><i class="fa fa-circle-o"></i>Cultivation Type List</a></li> --}}

                        </ul>
                    </li>

                    <li class="treeview">
                        {{-- <a href="#"><i class="fa fa-circle-o"></i>  State --}}
                            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                        </a>
                        <ul class="treeview-menu">
                            {{-- <li><a href="{{route('state.create')}}"><i class="fa fa-circle-o"></i>Add State</a></li> --}}
                            {{-- <li><a href="{{route('state.index')}}"><i class="fa fa-circle-o"></i>State List</a></li> --}}

                        </ul>
                    </li>

                </ul>

                <li class="treeview">
                    {{-- <a href="#"><i class="fa fa-circle-o"></i> Soil Nutrition --}}
                        <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        {{-- <li><a href="{{route('soilNutrition.create')}}"><i class="fa fa-circle-o"></i> Add Soil Nutrition</a></li> --}}
                        {{-- <li><a href="{{route('soilNutrition.index')}}"><i class="fa fa-circle-o"></i> Soil Nutrition List </a></li> --}}
                    </ul>
                </li>




            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
