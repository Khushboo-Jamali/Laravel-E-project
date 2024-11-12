@include('frontend.header')
    <!-- home content -->
    <section class="home">
      <div class="content">
        <h3>
          Biggest Clothe Sale <br />
          <span>Up To 50% Off</span>
        </h3>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque
          culpa, totam sed maxime animi facilis!
        </p>
        <a href="./customers/login.php">
          <button id="shopnow">Shop Now</button>
        </a>
      </div>
      <div class="img">
        <img src="{{asset('image/b2.png')}}" alt="" />
      </div>
    </section>
    <!-- home content -->
  </div>

  <!-- top cards -->
  <div class="container" id="top-cards">
    <div class="row">
      <div class="col-md-5 py-3 py-md-0">
        <div class="card" style="background-color: #a9a9a926">
          <img src="{{asset('image/topcard1.png')}}" alt="" />
          <div class="card-img-overlay">
            <h5 class="card-titel">Smart Watch</h5>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Provident, ratione!
            </p>
            <p>
              <strong>$200.30 <strike>$250.10</strike></strong>
            </p>
            <button>Order Now</button>
          </div>
        </div>
      </div>
      <div class="col-md-4 py-3 py-md-0">
        <div class="card" style="background-color: #a9a9a926">
          <img src="{{asset('image/topcard2.png')}}" alt="" />
          <div class="card-img-overlay">
            <h5 class="card-titel">Nike Shoes</h5>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Provident, ratione!
            </p>
            <p>
              <strong>$150.10 <strike>$200.10</strike></strong>
            </p>
            <button>Order Now</button>
          </div>
        </div>
      </div>
      <div class="col-md-3 py-3 py-md-0">
        <div class="card" style="background-color: #a9a9a926">
          <img src="{{asset('/image/topcard3.png')}}" alt="" />
          <div class="card-img-overlay">
            <h5 class="card-titel">Bag</h5>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
            <p>              <strong>$50.10 <strike>$60</strike></strong>
            </p>
            <button>Order Now</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- top cards -->

  <!-- banner -->
  <div class="banner">
    <div class="content">
      <h1>Get Up To 50% Off</h1>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora,
        animi?
      </p>
      <div id="bannerbtn"><button>SHOP NOW</button></div>
    </div>
  </div>
  <!-- banner -->

  <!-- product cards -->
  <section class="shop container">
    <h2 class="section-title">Shop Products</h2>

    <!-- CONTENT  -->
    <div class="shop-content">
      <div class="cart">
        <h2 class="cart-title">Your Cart</h2>

        <!-- CONTENT  -->
        <div class="cart-content"></div>

        <!-- TOTAL   -->
        <div class="total">
          <div class="total-title">Total</div>
          <div class="total-price">$0</div>
        </div>
        <!-- BUY BUTTON  -->
        <button type="button" class="btn-buy">Remove All Carts</button>
        <!-- CART CLOSE  -->
        <i class="bx bx-x" id="cart-close"></i>
      </div>
      <!-- BOX 1 -->
      <div class="product-box">
        <img src="{{asset('image/p1.png')}}" alt="" class="product-img" />
        <h2 class="product-title">Nike Shoes</h2>
        <span class="product-price">$79.5</span>
        <i class="bx bx-shopping-bag add-cart"></i>
      </div>
      <!-- BOX 2 -->
      <div class="product-box">
        <img src="{{asset('image/p10.jpg')}}" alt="" class="product-img" />
        <h2 class="product-title">BACKPACK</h2>
        <span class="product-price">$59.5</span>
        <i class="bx bx-shopping-bag add-cart"></i>
      </div>
      <!-- BOX 3 -->
      <div class="product-box">
        <img src="{{asset('image/p11.jpg')}}" alt="" class="product-img" />
        <h2 class="product-title">METAL BOTTLE</h2>
        <span class="product-price">$29.5</span>
        <i class="bx bx-shopping-bag add-cart"></i>
      </div>
      <!-- BOX 4 -->
      <div class="product-box">
        <img src="{{asset('image/p12.jpg')}}" alt="" class="product-img" />
        <h2 class="product-title">METAL SUNGLASSES</h2>
        <span class="product-price">$105</span>
        <i class="bx bx-shopping-bag add-cart"></i>
      </div>
      <!-- BOX 5 -->
      <div class="product-box">
        <img src="{{asset('image/p12.jpg')}}" alt="" class="product-img" />
        <h2 class="product-title">PS5 Controller</h2>
        <span class="product-price">$95</span>
        <i class="bx bx-shopping-bag add-cart"></i>
      </div>
      <!-- BOX 6 -->
      <div class="product-box">
        <img src="{{asset('image/p13.png')}}" alt="" class="product-img" />
        <h2 class="product-title">Galaxy Z Fold</h2>
        <span class="product-price">$1400</span>
        <i class="bx bx-shopping-bag add-cart"></i>
      </div>
      <!-- BOX 7 -->
      <div class="product-box">
        <img src="{{asset('image/p15.png')}}" alt="" class="product-img" />
        <h2 class="product-title">Nokon Camera</h2>
        <span class="product-price">$1700</span>
        <i class="bx bx-shopping-bag add-cart"></i>
      </div>
      <!-- BOX 8 -->
      <div class="product-box">
        <img src="{{asset('image/p16.png')}}" alt="" class="product-img" />
        <h2 class="product-title">Apple Watch</h2>
        <span class="product-price">$110.5</span>
        <i class="bx bx-shopping-bag add-cart"></i>
      </div>
    </div>
  </section>

  <a href="clothe" id="viewmorebtn">View More</a>

  <!-- product cards -->

  <!-- product -->
  <div class="container" style="margin-top: 100px">
    <hr />
  </div>
  <div class="container">
    <h3 style="font-weight: bold">PRODUCT.</h3>
    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque vero
      eius ipsam incidunt illum totam nostrum quidem sit cumque fugit.
      Accusamus rem praesentium labore tempore ullam porro quaerat fugiat cum
      ipsum, sint perferendis voluptate ad, quod reiciendis officia! In
      voluptate quae expedita sunt eum placeat alias soluta. Rem commodi,
      impedit error doloribus ratione at provident beatae, aut doloremque sunt
      possimus voluptas recusandae nam aliquid eos quia minus harum repellat
      quae eveniet laborum dolore esse voluptate sed. Voluptate ullam dolor
      sapiente neque labore hic nam odio qui consectetur porro minima nesciunt
      suscipit vitae obcaecati reiciendis itaque ipsum unde, debitis nemo
      soluta!
    </p>

    <hr />
  </div>
  <!-- product -->

  <!-- offer -->
  <div class="container" id="offer">
    <div class="row">
      <div class="col-md-4 py-3 py-md-0">
        <i class="fa-solid fa-cart-shopping"></i>
        <h5>Free Shipping</h5>
        <p>On order over $100</p>
      </div>
      <div class="col-md-4 py-3 py-md-0">
        <i class="fa-solid fa-truck"></i>
        <h5>Fast Delivery</h5>
        <p>World wide</p>
      </div>
      <div class="col-md-4 py-3 py-md-0">
        <i class="fa-solid fa-thumbs-up"></i>
        <h5>Big Choice</h5>
        <p>Of product</p>
      </div>
    </div>
  </div>
  <!-- offer -->
@include('frontend.footer');