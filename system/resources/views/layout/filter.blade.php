<form class="banner-form__wrapper wow fadeInUp" action="{{ route('filter.kamar') }}" method="GET"
                    data-wow-delay="400ms">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="banner-form__control">
                                <label for="tipe_kamar">Tipe Kamar</label>
                                <select name="tipe_kamar" class="selectpicker" id="tipe_kamar">
                                    <option value="select">Pilih Tipe Kamar</option>
                                    <option value="Single Bed">Single Bed</option>
                                    <option value="Double Bed">Double Bed</option>
                                    {{-- <option value="Family Bed">Family Bed</option> --}}
                                </select>
                                <i class="icon-bed"></i>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="banner-form__control">
                                <label for="checkin">Checkin</label>
                                <input class="villoz-datepicker" id="checkin" type="text" name="checkin"
                                    placeholder="Masukkan Tanggal">
                                <i class="icon-calendar"></i>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="banner-form__control">
                                <label for="checkout">Checkout</label>
                                <input class="villoz-datepicker" id="checkout" type="text" name="checkout"
                                    placeholder="Masukkan Tanggal">
                                <i class="icon-calendar"></i>
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <button type="submit" aria-label="search submit" class="villoz-btn villoz-btn--base">
                                <i class="icon-magnifying-glass"></i>
                                <span><i class="icon-magnifying-glass"></i></span>
                            </button>
                        </div>
                    </div>
                </form>