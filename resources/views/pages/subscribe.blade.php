@extends('layouts.landing', ['navBarOnly' => true, 'bodyClass' => 'degree-list'])

@section('content')

    <div class="main container-fluid communicate image-bkg">
        <div class="container image-bkg-wrap">
            <div class="image-bkg">
                <div class="image-bkg-overlay"></div>
                <img class="degree-img" src="{{ asset('subscribe-bkg.jpg') }}" alt="">
            </div>

            <div class="subscribe-container">
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="title text-center" style="font-size:38px;">Come &amp; help us create talent the world deserves</h2>

                        <div class="contact">
                            <form action="https://xyz.us16.list-manage.com/subscribe/post?u=528cc9372b916077746636344&amp;id=f79db67249" method="post">
                                <input class="suscribe-input" name="EMAIL" type="email" placeholder="Enter your email to receive updates" required>
                                <input type="submit" class="submit" value="Subscribe" name="subscribe">
                            </form>
                            <div class="contact-icons">
                                <a class="contact-icon contact-icon-twitter" href="https://twitter.com/bitdegree_org" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a class="contact-icon contact-icon-slack" href="https://bitdegree.slack.com" target="_blank"><i class="fa fa-slack" aria-hidden="true"></i></a>
                                <a class="contact-icon contact-icon-github" href="https://github.com/bitdegree" target="_blank"><i class="fa fa-github" aria-hidden="true"></i></a>
                                <a class="contact-icon contact-icon-reddit" href="https://www.reddit.com/r/bitdegree" target="_blank"><i class="fa fa-reddit-alien" aria-hidden="true"></i></a>
                                <a class="contact-icon contact-icon-facebook" href="https://www.facebook.com/bitdegree.org/" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection