@extends('layouts.app')

@section('content')
    <div class="profil-home us">
        <main>
            <div class="basket st">
                <div class="basket-product">
                    <div class="wrapper">
                        <header>
                            <h1>Edit personal information</h1>
                        </header>

                        <div class="sections">

                            <section class="active">
                                <input type="text" placeholder="Name" name="edit_personal_name" />
                                <input type="text" placeholder="Surname" name="edit_personal_surname" />

                                <div class="select-container">
                                    <div class="text-select">
                                        <select name="edit_personal_day" id="day" >
                                            <option selected disabled>Day</option>
                                        </select>
                                    </div>
                                    <div class="text-select">
                                        <select name="edit_personal_months" id="months">
                                            <option selected disabled>Months</option>
                                            <option value="january">January</option>
                                            <option value="february">February</option>
                                            <option value="march">March</option>
                                            <option value="october">October</option>
                                            <option value="november">November</option>
                                            <option value="december">December</option>
                                        </select>
                                    </div>
                                    <div class="text-select">
                                        <select name="edit_personal_year" id="year" >
                                            <option selected disabled>Year</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="images edit-uesr-photo">
                                    <div class="pic edit-uesr-photo">
                                        add
                                    </div>
                                </div>


                            </section>

                            <section>
                                <input type="text" placeholder="Topic" />
                                <textarea placeholder="something..." id="msg"></textarea>
                            </section>

                        </div>

                        <footer>
                            <ul>
                                <li><span id="edit-personal-information-reset">reset</span></li>
                                <li><span id="edit-personal-information">send</span></li>
                            </ul>
                        </footer>

                    </div>
                    <div class="wrapper">
                        <header>
                            <h1>Delivery Addresses</h1>
                            <span></span>
                        </header>
                        <div class="sections">
                            <section class="active">
                                <input type="text" placeholder="Receiver name" name="receiver_name" />
                                <input type="text" placeholder="Country / Region" name="country_region" />
                                <input type="text" placeholder="Street, house, flat" name="street_house_flat" />
                                <input type="text" placeholder="City" name="city" />
                                <input type="text" placeholder="Postcode" name="postcode" />
                                <input type="text" placeholder="Mobile phone" name="mobile_phone" />
                            </section>

                            <section>
                                <input type="text" placeholder="Topic" />
                                <textarea placeholder="something..." id="msg"></textarea>
                            </section>

                        </div>

                        <footer>
                            <ul>
                                <li><span id="append_delivery_addresses_reset">reset</span></li>
                                <li><span id="append_delivery_addresses">send</span></li>
                            </ul>
                        </footer>

                    </div>
                </div>
                <div class="basket-product">
                    <div class="wrapper">
                        <header>
                            <h1>Edit email address</h1>
                            <span></span>
                        </header>

                        <div class="sections">

                            <section class="active a-p-e-m">
                                <input type="text" placeholder="Old email address" name="old_email_address" />
                                <input type="text" placeholder="New email address" name="new_email_address"/>
                                <input type="text" placeholder="Repeat the new email address" name="repeat_email_address" />
                            </section>

                            <section>
                                <input type="text" placeholder="Topic" />
                                <textarea placeholder="something..." id="msg"></textarea>
                            </section>

                        </div>

                        <footer>
                            <ul>
                                <li><span id="edit_email_user_reset">reset</span></li>
                                <li><span id="edit_email_user">send</span></li>
                            </ul>
                        </footer>

                    </div>
                    <div class="wrapper">
                        <header>
                            <h1>Edit password</h1>
                            <span></span>
                        </header>

                        <div class="sections">

                            <section class="active">
                                <section class="active">
                                    <input type="text" placeholder="Old password" name="old_password" />
                                    <input type="text" placeholder="New password" name="new_password" />
                                    <input type="text" placeholder="Repeat the new password" name="repeat_password" />
                                </section>
                            </section>

                            <section>
                                <input type="text" placeholder="Topic"/>
                                <textarea placeholder="something..." id="msg"></textarea>
                            </section>

                        </div>

                        <footer>
                            <ul>
                                <li><span id="edit_paswors_user_reset">reset</span></li>
                                <li><span id="edit_paswors_user">send</span></li>
                            </ul>
                        </footer>

                    </div>
                </div>
            </div>
{{--            <div class="basket st">--}}
{{--                <div class="wrapper">--}}
{{--                    <header>--}}
{{--                        <h1>Stock photo</h1>--}}
{{--                        <span>ID: 5988014</span>--}}
{{--                    </header>--}}

{{--                    <div class="ways">--}}
{{--                        <ul>--}}
{{--                            <li class="active">--}}
{{--                                submit--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                discussion--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}

{{--                    <div class="sections">--}}

{{--                        <section class="active">--}}
{{--                            <input type="text" placeholder="Title" id="title"/>--}}
{{--                            <select id="category">--}}
{{--                                <option value="summmer">summer</option>--}}
{{--                                <option value="winter">winter</option>--}}
{{--                                <option value="working">working</option>--}}
{{--                                <option value="road">road</option>--}}
{{--                            </select>--}}

{{--                            <div class="select-option">--}}
{{--                                <div class="head">Category</div>--}}
{{--                                <div class="option"></div>--}}
{{--                            </div>--}}


{{--                            <div class="images">--}}
{{--                                <div class="pic">--}}
{{--                                    add--}}
{{--                                </div>--}}
{{--                            </div>--}}


{{--                        </section>--}}

{{--                        <section>--}}
{{--                            <input type="text" placeholder="Topic" id="topic"/>--}}
{{--                            <textarea placeholder="something..." id="msg"></textarea>--}}
{{--                        </section>--}}

{{--                    </div>--}}

{{--                    <footer>--}}
{{--                        <ul>--}}
{{--                            <li><span id="reset">reset</span></li>--}}
{{--                            <li><span id="send">send</span></li>--}}
{{--                        </ul>--}}
{{--                    </footer>--}}

{{--                </div>--}}
{{--                <div class="wrapper">--}}
{{--                    <header>--}}
{{--                        <h1>Stock photo</h1>--}}
{{--                        <span>ID: 5988014</span>--}}
{{--                    </header>--}}

{{--                    <div class="ways">--}}
{{--                        <ul>--}}
{{--                            <li class="active">--}}
{{--                                submit--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                discussion--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}

{{--                    <div class="sections">--}}

{{--                        <section class="active">--}}
{{--                            <input type="text" placeholder="Title" id="title"/>--}}
{{--                            <select id="category">--}}
{{--                                <option value="summmer">summer</option>--}}
{{--                                <option value="winter">winter</option>--}}
{{--                                <option value="working">working</option>--}}
{{--                                <option value="road">road</option>--}}
{{--                            </select>--}}

{{--                            <div class="select-option">--}}
{{--                                <div class="head">Category</div>--}}
{{--                                <div class="option"></div>--}}
{{--                            </div>--}}


{{--                            <div class="images">--}}
{{--                                <div class="pic">--}}
{{--                                    add--}}
{{--                                </div>--}}
{{--                            </div>--}}


{{--                        </section>--}}

{{--                        <section>--}}
{{--                            <input type="text" placeholder="Topic" id="topic"/>--}}
{{--                            <textarea placeholder="something..." id="msg"></textarea>--}}
{{--                        </section>--}}

{{--                    </div>--}}

{{--                    <footer>--}}
{{--                        <ul>--}}
{{--                            <li><span id="reset">reset</span></li>--}}
{{--                            <li><span id="send">send</span></li>--}}
{{--                        </ul>--}}
{{--                    </footer>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--            <aside>--}}
{{--                <div class="summary">--}}
{{--                    <div class="summary-total-items"><span class="total-items"></span> Items in your Bag</div>--}}
{{--                    <div class="summary-subtotal">--}}
{{--                        <div class="subtotal-title">Subtotal</div>--}}
{{--                        <div class="subtotal-value final-value" id="basket-subtotal">130.00</div>--}}
{{--                        <div class="summary-promo hide">--}}
{{--                            <div class="promo-title">Promotion</div>--}}
{{--                            <div class="promo-value final-value" id="basket-promo"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="summary-delivery">--}}
{{--                        <select name="delivery-collection" class="summary-delivery-selection">--}}
{{--                            <option value="0" selected="selected">Select Collection or Delivery</option>--}}
{{--                            <option value="collection">Collection</option>--}}
{{--                            <option value="first-class">Royal Mail 1st Class</option>--}}
{{--                            <option value="second-class">Royal Mail 2nd Class</option>--}}
{{--                            <option value="signed-for">Royal Mail Special Delivery</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="summary-total">--}}
{{--                        <div class="total-title">Total</div>--}}
{{--                        <div class="total-value final-value" id="basket-total">130.00</div>--}}
{{--                    </div>--}}
{{--                    <div class="summary-checkout">--}}
{{--                        <button class="checkout-cta">Go to Secure Checkout</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </aside>--}}
            @include('profil-menu')
        </main>
    </div>


@endsection

@section('js')
    <script type="text/javascript" src="{{asset('js/magazin/settings.js')}}"></script>
@endsection

