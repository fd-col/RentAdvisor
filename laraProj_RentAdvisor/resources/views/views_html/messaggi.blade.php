@extends('layouts.layout')

@section('title', 'Messaggi')

@section('content')

<!-- Section relativa ai messaggi -->

@isset($user)
	<script>
		jQuery(function(){
				$locatore=null;
				$locatario=null;
				$ruolo='{{$user->role}}';
				if($ruolo=='locatario')
					$locatario='{{$user->username}}';
				else
					$locatore='{{$user->username}}';
				if($('#user_chat').has('p'))
				{
					if($ruolo=='locatario')
						{
							$route="{{route('mostra_chat_locatario')}}";

						}
					else
						{
							$route="{{route('mostra_chat_locatore')}}";

						}
					$.ajax({
                        type: 'POST',
                        url: $route,
                        data: {"user": $('#user_chat').find('p').text(),
							   "_token": "{{csrf_token()}}"},
                        dataType: 'json',
                        success: setChat

                    });
				}
				$('#container').on('click','a',function (){
					$('#chat').find('div').remove();
					$user=$(this).attr('id');
					if($ruolo=='locatario')
						{
							$route="{{route('mostra_chat_locatario')}}";
							$locatore=$(this).attr('id');
						}
					else
						{
							$route="{{route('mostra_chat_locatore')}}";
							$locatario=$(this).attr('id');
						}
					$.ajax({
                        type: 'POST',
                        url: $route,
                        data: {"user": $user,
							   "_token": "{{csrf_token()}}"},
                        dataType: 'json',
                        success: setChat

                    });
					$('#user_chat').find('p').remove();
					$('#user_chat').append('<p>'+$user+'</p>');
				})
				function setChat(data){
					$('#chat').find('div').remove();
					$.each($.parseJSON(data), function (key, val) {
						if(val.mittente=='{{$user->role}}')
							$('#chat').append("<div class=\"messaggi-inviati\">"+val.testo+"</div>");
						else
							$('#chat').append("<div class=\"messaggi-ricevuti\">"+val.testo+"</div>");
				})};

				$('#button').click(function (){
					if($ruolo=='locatario')
						$locatore=$('#user_chat').find('p').text();
					else
						$locatario=$('#user_chat').find('p').text();
					if('{{$user->role}}'=='locatario')
						$route="{{route('send_locatore')}}";
					else
						$route="{{route('send_locatore')}}";
					$.ajax({
						type:'POST',
						url:$route,
						data:{"locatore": $locatore,
							  "locatario":$locatario,
							  "testo":$('textarea#messaggio').val(),
							  "_token": "{{csrf_token()}}"
						},
						dataType:'json',
						success: setSuccess,
						error: setError
					})
				})
				function setError(jqXHR, textStatus, errorThrown){
					$parse=$.parseJSON(jqXHR.responseText);
					$('#banner').find('p').remove();
					$('#banner').attr('class', 'banner_fail');
					if($parse.errors.testo)
						$('#banner').append('<p>'+$parse.errors.testo+'</p>');
					if($parse.errors.locatario)
						$('#banner').append('<p>'+$parse.errors.locatario+'</p>');
					if($parse.errors.locatore)
						$('#banner').append('<p>'+$parse.errors.locatore+'</p>');
					$('#banner').show('slow');
					$('#banner').delay(5000).hide('slow');

					};
				function setSuccess(data){
					$('#banner').find('p').remove();
					$('textarea#messaggio').val('');
					$('#banner').attr('class', 'banner_success');
					$('#banner').append('<p>Messaggio inviato con successo, <a id='+$.parseJSON(data).user+'> clicca qui per ricaricare la chat</a>');
					$('#banner').show('slow');
					$('#banner').delay(5000).hide('slow');


				}

		})
	</script>
  <div id="container" class="container">
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

			<div class="user_chat" id="user_chat">
			@isset($user_message)
			<p>{{$user_message}}</p>
			@endisset
			</div>

			<p class="user_chat" id="user_chat"></p>
              <fieldset style="border: 1px solid black; padding-top:60px">
			  <div id="banner" hidden>
			  </div>
                <div class="aa-blog-area" id="chat">


                </div>
                </fieldset>

                  <div class="aa-blog-area" id="messaggio">
				   <form method="POST" accept-charset="UTF-8" onSubmit="return send_Message()" class="contactform">

                      <div style="margin-top: 20px; margin-bottom: 20px">
					  {{ Form::textarea('testo', '', ['class' => 'textarea-style','id' => 'messaggio', 'aria-required' => 'true', 'cols' => '45', 'rows' => '4', 'maxlength' => '1000', 'resize' => 'none']) }}
                      <div id="button" class="send-button" >INVIA</div>
                        <div id="errors">
                        </div>
                      </div>
                  </form>
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
					  <!-- message set -->
						@foreach($messaggi as $utenti)
						<!-- foreach enter-->
						<li>
                            <div class="media">
                                <div class="media-left">
                                    <span class="fa fa-user"></span>
                                </div>
                                <div class="media-body">
                                    <h4 class="author-name">{{$utenti->username}}</h4>
                                        <a class="reply-btn" id="{{$utenti->username}}">Vedi chat</a>
                                </div>
                                        </div>
                                    </li>
						@endforeach
					  @endisset
                    </ul>
                  </div>
                </div>
              </div>
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
