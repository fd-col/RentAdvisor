@extends('layouts.layout')

@section('title', 'Messaggi')

@section('content')

<!-- Section relativa ai messaggi -->

@isset($user)

  <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="aa-title">
            <hr>
            <h2>Conversazione</h2>
            <span></span>
          </div>
          <div class="aa-properties-content">

            <div class="aa-properties-content-body">
            <!-- Sezione messaggi inviati-->

              <fieldset style="border: 1px solid black; padding-top:60px">
                <div class="aa-blog-area">
                <ul>
                @isset($messaggi)
                  @foreach($messaggi as $messaggio)

                    @if($messaggio->username_locatore == $user->username)
                  <div class="messaggi-inviati">
                    <li><h3>Tu</h3>
                    <p>{{$messaggio->testo}}</p></li>
                  </div>
                    @else
                  <div class="messaggi-ricevuti">
                    <li><h3>{{&messaggio->username_locatario}}</h3>
                    <p>{{$messaggio->testo}}</p></li>
                  </div>
                    @endif
                </ul>
                </div>
                  @endforeach
                @endisset
                </fieldset>

                  <div class="aa-blog-area">
                  {{ Form::open(array('route' => '', 'class' => 'contactform')) }}
                      <div style="margin-top: 20px; margin-bottom: 20px">
                      {{ Form::textarea('messaggio', '', ['class' => 'input','id' => 'messaggio', 'aria-required' => 'true']) }}
                      {{ Form::submit('Invia', ['class' => 'send-button']) }}
                      </div>
                  {{ Form::close() }}
                  </div>
            </div>
          </div>
        </div>


          <!-- Start properties sidebar -->
          <div class="col-md-4">
            <aside class="aa-properties-sidebar">
              <!-- Start Single properties sidebar -->
              <div class="aa-properties-single-sidebar">
                  <div class="aa-title">
                    <hr>
                    <h2>Chat</h2>
                    <span></span>
                  </div>
                <!-- comment threats -->
                <div class="col-md-12">
                <div class="aa-comments-area">
                  <div class="comments">
                    <ul class="commentlist">
                      <li>
                        <div class="media">
                          <div class="media-left">
                              <img alt="img" src="img/testimonial-1.png" class="media-object news-img">
                          </div>
                          <div class="media-body">
                            <h4 class="author-name">Adam Barney</h4>
                            <span class="comments-date"> 20th April, 2016</span>
                            <p>Messaggio 1</p>
                            <a class="reply-btn" href="#">Rispondi</a>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="media">
                          <div class="media-left">
                              <img alt="img" src="img/testimonial-2.png" class="media-object news-img">
                          </div>
                          <div class="media-body">
                            <h4 class="author-name">John Smith</h4>
                            <span class="comments-date"> 20th April, 2016</span>
                            <p>Messaggio 2</p>
                            <a class="reply-btn" href="#">Reply</a>
                          </div>
                        </div>
                      </li>
                <!-- comments pagination -->
                <nav>
                  <ul class="pagination comments-pagination">
                    <li>
                      <a aria-label="Previous" href="#">
                        <span aria-hidden="true">«</span>
                        <span aria-hidden="true">»</span>
                      </a>
                    </li>
                  </ul>
                </nav>

              </div>
            </aside>
          </div>
        </div>
      </div>
    </section>
    <!-- / Properties  -->
  @endisset
@endsection
