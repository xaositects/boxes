
        <ul class="dropdown-content" id="user_options_mob">
            <li>
                <a href="/siteadmin">Site Admin<i class="material-icons right">settings</i></a>
            </li>
            <li>
                <a href="/files">Files <i class="material-icons right">photo_library</i></a>
            </li>
            @foreach ($profiles as $prof)
                <li>
                    <a class="profile-activate" data-id="1" href="switch-profile/{{ $prof->id }}">{{ $prof->firstname }}<i class="material-icons right">perm_identity</i></a>
                </li>
            @endforeach
            <li>
                <a class="item add-profile" href="/create-profile">Add Profile<i class="material-icons right">add</i></a>
            </li>
            <li>
                <a class="item add-profile" href="/update-profile">Update Profile<i class="material-icons right">edit</i></a>
            </li>
        </ul>
        <ul class="dropdown-content" id="user_options">
            <li>
                <a href="/siteadmin">Site Admin<i class="material-icons right">settings</i></a>
            </li>
            <li>
                <a href="/files">Files&nbsp;<i class="material-icons right">photo_library</i></a>
            </li>
            @foreach ($profiles as $prof)
                <li>
                    <a class="profile-activate" data-id="1" href="switch-profile/{{ $prof->id }}">{{ $prof->firstname }}<i class="material-icons right">perm_identity</i></a>
                </li>
            @endforeach
            <li>
                <a class="item add-profile" href="/create-profile">Add Profile<i class="material-icons right">add</i></a>
            </li>
            <li>
                <a class="item add-profile" href="/update-profile">Update Profile<i class="material-icons right">edit</i></a>
            </li>
        </ul>
        <div class="navbar-fixed">
            <nav>
                <div class="nav-wrapper black">
                    <a class="brand-logo" href="/">{{ $app_name }}</a><a class="button-collapse" href="#" data-activates="stash-mobile-nav"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down" id="user_bar">
                        <li>
                            <form class="right">
                                <input type="search" placeholder="Search">
                            </form>
                        </li>
                        <li>
                            <a class="dropdown-button" href="#!" data-activates="user_options">{{ $profile->firstname }}<i class="material-icons right">arrow_drop_down</i></a>
                        </li>
                        <li>
                            <a href="" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="material-icons">exit_to_app</i></a>
                            <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <ul class="side-nav" id="stash-mobile-nav">
            <li>
                <a class="brand-logo" href="/">{{ $app_name }}</a>
            </li>
            <li>
                <form>
                    <input type="search" placeholder="Search">
                </form>
            </li>
            <li>
                <a class="dropdown-button" href="#!" data-activates="user_options_mob">{{ $profile->firstname }}<i class="material-icons right">arrow_drop_down</i></a>
            </li>
            <li>
                <a href="" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="material-icons">exit_to_app</i></a>
                <form id="logout-form" action="/logout" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
