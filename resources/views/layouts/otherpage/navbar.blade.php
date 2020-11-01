<nav class="menu-classic menu-transparent light menu-fixed menu-one-page align-right" data-menu-anima="fade-bottom" data-scroll-detect="true">
    <div class="container">
        <div class="menu-brand">
            <a href="{{ route('home') }}">
                <img class="logo-default" src="{{ url('images/logo.png') }}" alt="logo" />
                <img class="logo-retina" src="{{ url('images/logo.png') }}" alt="logo" />
            </a>
        </div>
        <i class="menu-btn"></i>
        <div class="menu-cnt">
            <ul>
                <li>
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="{{ @$active['sermons'] }}">
                    <a href="#">Sermons</a>
                </li>
                <li class="{{ @$active['announcement'] }}">
                    <a href="#features">Announcements</a>
                </li>
                <li class="{{ @$active['epistle'] }}">
                    <a href="#">Epistle</a>
                </li>
                {{--
                <li class="dropdown">
                    <a href="#">Pages</a>
                    <ul>
                        <li class="dropdown-submenu">
                            <a href="#">Sites</a>
                            <ul>
                                <li><a href="index-saas.html">Saas</a></li>
                                <li><a href="index-fintech.html">Fintech</a></li>
                                <li><a href="index-sport.html">Sport</a></li>
                                <li><a href="index-food.html">Food</a></li>
                                <li><a href="index-chat.html">Chat</a></li>
                                <li><a href="index-music.html">Music</a></li>
                                <li><a href="index-photo.html">Photo</a></li>
                                <li><a href="index-travel.html">Travel</a></li>
                                <li><a href="index-news.html">News</a></li>
                                <li><a href="index.html">Intro</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a href="#">Pages</a>
                            <ul>
                                <li><a href="about.html">About</a></li>
                                <li><a href="careers.html">Careers</a></li>
                                <li><a href="faq.html">Faqs</a></li>
                                <li><a href="customers.html">Success stories</a></li>
                                <li><a href="pricing-1.html">Pricing one</a></li>
                                <li><a href="pricing-2.html">Pricing two</a></li>
                                <li><a href="team.html">Team</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a href="#">Blog</a>
                            <ul>
                                <li><a href="blog-1.html">Blog one</a></li>
                                <li><a href="blog-2.html">Blog two</a></li>
                                <li><a href="post.html">Post</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a href="#">Contacts</a>
                            <ul>
                                <li><a href="contacts-1.html">Contacts one</a></li>
                                <li><a href="contacts-2.html">Contacts two</a></li>
                                <li><a href="contacts-3.html">Contacts three</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Elements</a>
                        </li>
                    </ul>
                </li>
                --}}
            </ul>
            <div class="menu-right">
                <div class="menu-custom-area">
                    <!--
                    <a class="btn btn-xs btn-border btn-circle" href="#">Download App</a>
                    -->
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</nav>