@extends('layouts.public')

@section('title', 'Contatti')

@section('content')
 <section id="aa-contact">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
          <div class="aa-title">
            <h2>Pagina dei Contatti</h2>
            <span></span>
          </div>
          <div class="aa-contact-area">
            <div class="aa-contact-top">
              <div class="aa-contact-top-left">
                <iframe width="100%" height="450" frameborder="0" allowfullscreen="" style="border:0" src="https://maps.google.com/maps?q=Via%20brecce%20bianche%202-8,%20Ancona&t=&z=13&ie=UTF8&iwloc=&output=embed" ></iframe>
              </div>
              <div class="aa-contact-top-right">
                <h2>Contatti</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae placeat aspernatur aperiam, quisquam voluptas enim tempore ab itaque nam modi eos corrupti distinctio nobis labore dolorum quae tenetur. Sapiente, sequi.</p>
                <ul class="contact-info-list">
                  <li> <i class="fa fa-phone"></i> 071xxxxxx</li>
                  <li> <i class="fa fa-envelope-o"></i> info@rentadvisor.com</li>
                  <li> <i class="fa fa-map-marker"></i> Ancona, AN, 60125, Italia</li>
                </ul>
              </div>
            </div>
            <div class="aa-contact-bottom"> <!-- da modicare il nome nel .css-->
              <div class="aa-title">
                <fieldset style="border: 1px solid black">
                  <h2>Email</h2>
                  <br>
                  <p><strong>Servizio assistenza clienti </strong></p>
                  <p></p>
                  <p>info@rentadvisor.com</p>
                </fieldset>
              </div>
              <div class="aa-title">
                <fieldset style="border: 1px solid black">
                  <h2>Telefoni</h2>
                  <br>
                  <p><strong >Servizio assistenza clienti </strong></p>
                  <p></p>
                  <p>333xxxxx</p>
                  <p></p>
                  <p>071xxxxxx</p>
                </fieldset>
              </div>

              </div>
            </div>
          </div>
       </div>
     </div>
   </div>
 </section>
@endsection

