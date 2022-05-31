@extends('layouts.layout')

@section('title', 'Messaggi')

@section('content')

<!-- Section relativa ai messaggi -->

@isset($user)
	<script>
		jQuery(function(){
				if('{{$user->role}}'=='locatario')
					$('#locatario').attr('value', '{{$user->username}}');
				else
					$('#locatore').attr('value', '{{$user->username}}');
				$('form').remove('action');
				$('a').click(function(){
					$user=$(this).attr('id');
					if('{{$user->role}}'=='locatario')
						$route="{{route('mostra_chat_locatario')}}";
					else
						$route="{{route('mostra_chat_locatore')}}";
					$.ajax({
                        type: 'POST',
                        url: $route,
                        data: {"user": $user,
							   "_token": "{{csrf_token()}}"},
                        dataType: 'json',
                        success: setChat
						
                    });
					if('{{$user->role}}'=='locatario')	
							$('#locatore').attr('value', $user);	
					else
							$('#locatario').attr('value', $user);	
						
				})
				function setChat(data){
					$('#chat').find('div').remove();
					$.each($.parseJSON(data), function (key, val) {
						if(val.mittente=='{{$user->role}}')
							$('#chat').append("<div class=\"messaggi-inviati\">"+val.testo+"</div>");
						else
							$('#chat').append("<div class=\"messaggi-ricevuti\">"+val.testo+"</div>");
				})};
					
				function send_Message(){
					if('{{$user->role}}'=='locatario')
						$route="{{route('send_locatore')}}";
					else
						$route="{{route('send_locatore')}}";
					$.ajax({
						type:'POST',
						url:$route,
						data:{"_token":"{{csrf_token()}}",
							  "locatore": $('#locatore').val(),
							  "locatario":$('#locatario').val(),
							  "testo":$('#messaggio').val(),
						},
						dataType:'json',
						success: setChat
					})
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
			@isset($message_user)
			<p class="user_chat" id="user_chat">$message_user</p>
			@endisset
			<p class="user_chat" id="user_chat"></p>
              <fieldset style="border: 1px solid black; padding-top:60px">
                <div class="aa-blog-area" id="chat">
                

                </div>
                </fieldset>

                  <div class="aa-blog-area" id="messaggio">
				  {{ Form::open(array('onsubmit'=>'return send_Message()','class' => 'contactform')) }}	  
                      <div style="margin-top: 20px; margin-bottom: 20px">
                      {{ Form::textarea('testo', '', ['class' => 'textarea-style','id' => 'messaggio', 'aria-required' => 'true', 'cols' => '45', 'rows' => '4', 'maxlength' => '1000', 'resize' => 'none']) }}
                      {{ Form::submit('Invia', ['class' => 'send-button']) }}
					  @isset($message_user)
					  {{ Form::hidden('locatario', $message_user->username, ['id'=>'locatario'])}}
					  {{ Form::hidden('locatore', $message_user->username, ['id'=>'locatore'])}}	
					@endisset
					  {{ Form::hidden('locatario', '', ['id'=>'locatario'])}}
					  {{ Form::hidden('locatore', '', ['id'=>'locatore'])}}
                        @foreach ($errors->all() as $message)
                            <p class="errors">{{ $message }}</p>
                        @endforeach
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
