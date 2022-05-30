@extends('layouts.layout')

@section('title', 'Messaggi')

@section('content')

<!-- Section relativa ai messaggi -->

@isset($user)
	<script>
		jQuery(function(){
				$('a').click(function(){
					$user=$(this).attr('id');
					$.ajax({
                        type: 'POST',
                        url: "{{ route('mostra_chat') }}",
                        data: {"user": $user,
							   "_token": "{{csrf_token()}}"},
                        dataType: 'json',
                        success: setChat
						
                    });
				})
				function setChat(data){
					$('#chat').find('div').remove();
					$.each($.parseJSON(data), function (key, val) {
						if(val.mittente=="locatore")
							$('#chat').append("<div class=\"messaggi-inviati\">"+val.testo+"</div>");
						else
							$('#chat').append("<div class=\"messaggi-ricevuti\">"+val.testo+"</div>");
					});
				}
		
		})
	</script>
  <div class="container">
      <div class="row">
        <div class="col-md-8">
          
          <div class="aa-properties-content">
			<div class="aa-title">
            <hr>
            <h2>Conversazione</h2>
            <span></span>
          </div>
            <div class="aa-properties-content-body">
            <!-- Sezione messaggi inviati-->

              <fieldset style="border: 1px solid black; padding-top:60px">
                <div class="aa-blog-area" id="chat">
                

                </div>
                </fieldset>

                  <div class="aa-blog-area">
                  {{ Form::open(array('route' => 'home', 'class' => 'contactform')) }}
                      <div style="margin-top: 20px; margin-bottom: 20px">
                      {{ Form::textarea('messaggio', '', ['class' => 'textarea-style','id' => 'messaggio', 'aria-required' => 'true', 'cols' => '45', 'rows' => '4', 'maxlength' => '1000', 'resize' => 'none']) }}
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
                      @isset($messaggi)
					  
						@foreach($messaggi as $utenti)
						<li>
                            <div class="media">
                                <div class="media-left">
                                    <span class="fa fa-user"></span>
                                </div>
                                <div class="media-body">
                                    <h4 class="author-name">{{$utenti->username_locatario}}</h4>
                                        <a class="reply-btn" id="{{$utenti->username_locatario}}">Vedi chat</a>
                                </div>
                                        </div>
                                    </li>
						@endforeach
					  @endisset
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
	  </div>
    </section>
    <!-- / Properties  -->
  @endisset
@endsection
