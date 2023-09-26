<link flex href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
<style>
            /* Import Google font - Poppins */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body {
  min-height: 100vh;
  background: #eef5fe;
}
/* Pre css */
.flex {
  display: flex;
  align-items: center;
}

/* Sidebar */
.sidebar {
  position: fixed;
  top: 55px;
  left: 0;
  height: 100%;
  width: 270px;
  background: #fff;
  padding: 15px 10px;
  box-shadow: 0 0 2px rgba(0, 0, 0, 0.1);
  transition: all 0.4s ease;
}

.logo_items {
  gap: 8px;
}
.logo_name {
  font-size: 22px;
  color: #333;
  font-weight: 500px;
  transition: all 0.3s ease;
  margin-left: 50px;
  font-family: cursive;
}

#lock-icon {
  padding: 10px;
  color: #4070f4;
  font-size: 25px;
  cursor: pointer;
  margin-left: -4px;
  transition: all 0.3s ease;
}

.menu_container {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  margin-top: 40px;
  overflow-y: auto;
  height: calc(100% - 82px);
}

.menu_title {
  position: relative;
  height: 50px;
  width: 55px;
}
.menu_title .title {
  margin-left: 15px;
  transition: all 0.3s ease;
}

.link {
  text-decoration: none;
  border-radius: 8px;
  margin-bottom: 8px;
  color: #707070;
}
.link:hover {
  color: #fff;
  background-color: #4070f4;
}

.link:focus {
  color: #fff;
  background-color: #4070f4;
}


.link span {
  white-space: nowrap;
}
.link i {
  height: 50px;
  min-width: 55px;
  display: flex;
  font-size: 22px;
  align-items: center;
  justify-content: center;
  border-radius: 4px;
  
}
ul {
  list-style-type: none;
}
</style>


    <nav class="sidebar locked">
      <div class="logo_items flex">
        
        <span class="logo_name">LaraProject</span>
        
        <i class="bx bxs-castle" id="lock-icon" title="Unlock Sidebar"></i>
      </div>

      <div class="menu_container">
        <div class="menu_items">
          <ul class="menu_item">
            
            <li class="item">
              <a href="{{url('clients')}}" class="link flex">
                <i class='bx bx-user'></i>
                <span>Clients</span>
              </a>
            </li>
            <li class="item">
              <a href="{{url('clients/invite')}}" class="link flex">
                <i class='bx bx-send'></i>
                <span>Invit a client</span>
              </a>
            </li>

             <li class="item">
              <a href="{{ route('logout') }}" class="link flex"
              onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                <i class='bx bx-log-out'></i>
                <span>{{ __('Logout') }}</span>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
          </ul>
        </div>
      </div>
    </nav>
