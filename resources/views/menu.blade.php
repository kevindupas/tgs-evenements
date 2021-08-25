<nav class="side-nav">
                <a href="" class="intro-x flex items-center pl-5 pt-4">
                    <img alt="Rubick Tailwind HTML Admin Template" class="w-6" src="/images/logo.svg">
                    <span class="hidden xl:block text-white text-lg ml-3"> Ru<span class="font-medium">bick</span> </span>
                </a>
                <div class="side-nav__devider my-6"></div>
                <ul>
                    <li>
                        <a href="{{ route('dashboard') }}" class="side-menu {{ (request()->is('dashboard')) ? 'side-menu--active' : '' }}">
                            <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                            <div class="side-menu__title">
                                Dashboard
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('categories') }}" class="side-menu {{ (request()->is('dashboard/categories*')) ? 'side-menu--active' : '' }}">
                            <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                            <div class="side-menu__title"> {{ __('Categories') }}</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('posts') }}" class="side-menu {{ (request()->is('dashboard/posts*')) ? 'side-menu--active' : '' }}">
                            <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
                            <div class="side-menu__title"> {{ __('Posts') }} </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('tags') }}" class="side-menu {{ (request()->is('dashboard/tags*')) ? 'side-menu--active' : '' }}">
                            <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
                            <div class="side-menu__title"> {{ __('Tags') }} </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('salons') }}" class="side-menu {{ (request()->is('dashboard/salons*')) ? 'side-menu--active' : '' }}">
                            <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
                            <div class="side-menu__title"> {{ __('Salons') }} </div>
                        </a>
                    </li>
                    <!-- <li class="side-nav__devider my-6"></li> -->
                </ul>
            </nav>