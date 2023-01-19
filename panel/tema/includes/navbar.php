<nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
            <div class="container-fluid">
              <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                  <i class="bx bx-menu bx-sm"></i>
                </a>
              </div>

              <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                <!-- Search -->
                <div class="navbar-nav align-items-center">
                  <div class="nav-item navbar-search-wrapper mb-0">
                    <a class="nav-item nav-link search-toggler px-0" href="javascript:void(0);">
                      <i class="bx bx-search-alt bx-sm"></i>
                      <span class="d-none d-md-inline-block text-muted">Arama (Ctrl+/)</span>
                    </a>
                  </div>
                </div>
                <!-- /Search -->

                <ul class="navbar-nav flex-row align-items-center ms-auto">
                  <!-- Language -->
                  <!-- <li class="nav-item dropdown-language dropdown me-2 me-xl-0">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                      <i class="fi fi-us fis rounded-circle fs-3 me-1"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li>
                        <a class="dropdown-item" href="javascript:void(0);" data-language="en">
                          <i class="fi fi-us fis rounded-circle fs-4 me-1"></i>
                          <span class="align-middle">English</span>
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="javascript:void(0);" data-language="fr">
                          <i class="fi fi-fr fis rounded-circle fs-4 me-1"></i>
                          <span class="align-middle">French</span>
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="javascript:void(0);" data-language="de">
                          <i class="fi fi-de fis rounded-circle fs-4 me-1"></i>
                          <span class="align-middle">German</span>
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="javascript:void(0);" data-language="pt">
                          <i class="fi fi-pt fis rounded-circle fs-4 me-1"></i>
                          <span class="align-middle">Portuguese</span>
                        </a>
                      </li>
                    </ul>
                  </li> -->
                  
                  <!--/ Language -->

                  <!-- Style Switcher -->
                  <li class="nav-item me-2 me-xl-0">
                    <a class="nav-link style-switcher-toggle hide-arrow" href="javascript:void(0);">
                      <i class="bx bx-sm"></i>
                    </a>
                  </li>
                  <!--/ Style Switcher -->

                  <!-- Quick links  -->
                  <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown me-2 me-xl-0">
                    <a
                      class="nav-link dropdown-toggle hide-arrow"
                      href="javascript:void(0);"
                      data-bs-toggle="dropdown"
                      data-bs-auto-close="outside"
                      aria-expanded="false"
                    >
                      <i class="bx bx-grid-alt bx-sm"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end py-0">
                      <div class="dropdown-menu-header border-bottom">
                        <div class="dropdown-header d-flex align-items-center py-3">
                          <h5 class="text-body mb-0 me-auto">Kısa Yollar</h5>
                         
                        </div>
                      </div>
                      <div class="dropdown-shortcuts-list scrollable-container">
                        <div class="row row-bordered overflow-visible g-0">
                     
                          <div class="dropdown-shortcuts-item col">
                            <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                              <i class="bx bx-food-menu fs-4"></i>
                            </span>
                            <a href="sinif.php" class="stretched-link">Sınıf</a>
                            <small class="text-muted mb-0">Sınıf Yönetimi</small>
                          </div>
                        </div>
                        
                      </div>
                      
                    </div>
                  </li>
                  <!-- Quick links -->

                  <!-- Notification 
                  <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-2">
                    <a
                      class="nav-link dropdown-toggle hide-arrow"
                      href="javascript:void(0);"
                      data-bs-toggle="dropdown"
                      data-bs-auto-close="outside"
                      aria-expanded="false"
                    >
                      <i class="bx bx-bell bx-sm"></i>
                      <span class="badge bg-danger rounded-pill badge-notifications">5</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end py-0">
                      <li class="dropdown-menu-header border-bottom">
                        <div class="dropdown-header d-flex align-items-center py-3">
                          <h5 class="text-body mb-0 me-auto">Bildiirmler</h5>
                          <a
                            href="javascript:void(0)"
                            class="dropdown-notifications-all text-body"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="Mark all as read"
                            ><i class="bx fs-4 bx-envelope-open"></i
                          ></a>
                        </div>
                      </li>
                      <li class="dropdown-notifications-list scrollable-container">
                        <ul class="list-group list-group-flush">
                      
                          <li class="list-group-item list-group-item-action dropdown-notifications-item">
                            <div class="d-flex">
                              <div class="flex-shrink-0 me-3">
                                <div class="avatar">
                                  <span class="avatar-initial rounded-circle bg-label-danger">CF</span>
                                </div>
                              </div>
                              <div class="flex-grow-1">
                                <h6 class="mb-1">Yeni Sipariş</h6>
                                <p class="mb-0">Accepted your connection</p>
                                <small class="text-muted">12hr ago</small>
                              </div>
                              <div class="flex-shrink-0 dropdown-notifications-actions">
                                <a href="javascript:void(0)" class="dropdown-notifications-read"
                                  ><span class="badge badge-dot"></span
                                ></a>
                                <a href="javascript:void(0)" class="dropdown-notifications-archive"
                                  ><span class="bx bx-x"></span
                                ></a>
                              </div>
                            </div>
                          </li>
                          
                       
                          <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                            <div class="d-flex">
                              <div class="flex-shrink-0 me-3">
                                <div class="avatar">
                                  <span class="avatar-initial rounded-circle bg-label-success"
                                    ><i class="bx bx-pie-chart-alt"></i
                                  ></span>
                                </div>
                              </div>
                              <div class="flex-grow-1">
                                <h6 class="mb-1">Monthly report is generated</h6>
                                <p class="mb-0">July monthly financial report is generated</p>
                                <small class="text-muted">3 days ago</small>
                              </div>
                              <div class="flex-shrink-0 dropdown-notifications-actions">
                                <a href="javascript:void(0)" class="dropdown-notifications-read"
                                  ><span class="badge badge-dot"></span
                                ></a>
                                <a href="javascript:void(0)" class="dropdown-notifications-archive"
                                  ><span class="bx bx-x"></span
                                ></a>
                              </div>
                            </div>
                          </li>
                          
                         
                          <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                            <div class="d-flex">
                              <div class="flex-shrink-0 me-3">
                                <div class="avatar">
                                  <span class="avatar-initial rounded-circle bg-label-warning"
                                    ><i class="bx bx-error"></i
                                  ></span>
                                </div>
                              </div>
                              <div class="flex-grow-1">
                                <h6 class="mb-1">CPU is running high</h6>
                                <p class="mb-0">CPU Utilization Percent is currently at 88.63%,</p>
                                <small class="text-muted">5 days ago</small>
                              </div>
                              <div class="flex-shrink-0 dropdown-notifications-actions">
                                <a href="javascript:void(0)" class="dropdown-notifications-read"
                                  ><span class="badge badge-dot"></span
                                ></a>
                                <a href="javascript:void(0)" class="dropdown-notifications-archive"
                                  ><span class="bx bx-x"></span
                                ></a>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </li>
                      <li class="dropdown-menu-footer border-top">
                        <a href="javascript:void(0);" class="dropdown-item d-flex justify-content-center p-3">
                         Tüm Bildirmler
                        </a>
                      </li>
                    </ul>
                  </li>
                  Notification -->

                  <!-- User -->
                  <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                      <div class="avatar avatar-online">
                        <img src="resim.jpg" alt class="rounded-circle" />
                      </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li>
                        <a class="dropdown-item" href="#">
                          <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                              <div class="avatar avatar-online">
                                <img src="resim.jpg" alt class="rounded-circle" />
                              </div>
                            </div>
                            <div class="flex-grow-1">
                              <span class="fw-semibold d-block lh-1">Yetkili</span>
                              <small>Ders Programı Otomasyonu</small>
                            </div>
                          </div>
                        </a>
                      </li>
                      <!-- <li>
                        <div class="dropdown-divider"></div>
                      </li>
                    
                
                      <li>
                        <a class="dropdown-item" href="pages-account-settings-billing.html">
                          <span class="d-flex align-items-center align-middle">
                            <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                            <span class="flex-grow-1 align-middle">Programlar</span>
                            <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20"
                              >4</span
                            >
                          </span>
                        </a>
                      </li> -->
                      <li>
                        <div class="dropdown-divider"></div>
                      </li>
                      <li>
                        <a type="button" class="dropdown-item"  onclick="logout();" >
                          <i class="bx bx-power-off me-2"></i>
                          <span class="align-middle">Çıkış</span>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <!--/ User -->
                </ul>
              </div>

              <!-- Search Small Screens -->
              <div class="navbar-search-wrapper search-input-wrapper d-none">
                <input
                  type="text"
                  class="form-control search-input container-fluid border-0"
                  placeholder="Search..."
                  aria-label="Search..."
                />
                <i class="bx bx-x bx-sm search-toggler cursor-pointer"></i>
              </div>
            </div>
          </nav>
