@extends('layouts.public')

@section('title', 'Dettagli Annuncio')

@section('content')


  <!-- Start Properties  -->
  <section id="aa-properties">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="aa-properties-content">
            <!-- Start properties content body -->
            <div class="aa-properties-details">
             <div class="aa-properties-details-img">
               <img src="{{ asset('images/slider/1.jpg') }}" alt="img">
               <img src="{{ asset('images/slider/2.jpg') }}" alt="img">
               <img src="{{ asset('images/slider/3.jpg') }}" alt="img">
             </div>
             <div class="aa-properties-info">
               <h2>TITOLO ANNUNCIO</h2>
               <span class="aa-price">$65000</span>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae voluptatibus veniam non voluptate, ipsa eius magni aliquid ratione sit, odio reprehenderit in quis repudiandae dolor.</p>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet consequatur, veritatis, ducimus in aliquam magnam voluptatibus ullam libero fugiat temporibus at, aliquid explicabo placeat eligendi, assumenda magni saepe eius consequuntur.</p>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium dicta aliquid, autem, cum, impedit nostrum, rem molestias quisquam ab iure enim totam? Itaque esse ut adipisci officiis nulla repellendus ratione dolore, iste ex doloribus tenetur eos provident quam quasi maxime.</p>
               <h4>Servizi inclusi</h4>
               <ul><table><tr><td><li>4 Bedroom</li></td>
                <td> <li>3 Baths</li></td></tr>
                 <tr><td><li>Kitchen</li></td>
                 <td><li>Air Condition</li></td></tr>
                 <tr><td><li>Belcony</li></td>
                 <td><li>Gym</li></td></tr>
                 <tr><td><li>Garden</li></td>
                 <td><li>CCTV</li></td></tr>
                 <tr><td><li>Children Play Ground</li></td>
                 <td><li>Comunity Center</li></td></tr>
                 <tr><td><li>Security System</li>
               </table></ul>
               <h4>Mappa</h4>
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6851.201919469417!2d-86.11773906635584!3d33.47324776828677!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x888bdb60cc49c571%3A0x40451ca6baf275c7!2s36008+AL-77%2C+Talladega%2C+AL+35160%2C+USA!5e0!3m2!1sbn!2sbd!4v1460452919256" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
             </div>
            </div>
          </div>
        </div>
        <!-- Start properties sidebar -->
        <div class="col-md-4">
          <aside class="aa-properties-sidebar">
            <!-- Start Single properties sidebar -->
            <div class="aa-properties-single-sidebar">
              <h3>Dettagli</h3>
				<p>
					<ul>
						<li>100 mq</li>
						<li> 3 bagni</li>
						<li> 7 posti letto</li>
						<li>...</li>
					</ul>
				</p>
            </div>
          </aside>
		  <aside class="aa-properties-sidebar">
			<div class="aa-properties-single-sidebar">
				<h3>Mario rossi</h3>
				<p>mario_rossi@gmail.com<br>
				0771777777<br>
				canone di affitto: 300€
				</p>
			</div>
		  </aside>
        </div>
      </div>
    </div>
  </section>
  <!-- / Properties  -->
@endsection
