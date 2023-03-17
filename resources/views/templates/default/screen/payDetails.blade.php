@php
    $months = array(1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Aug', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec');
@endphp
@php $A = Session::get('reqDetails') @endphp

<!-- Company Overview section START -->
<div class="row">
    <div class="col-md-12">
    <div class="row">
                                                <div class="form-group owner col-md-8">
                                                    <label for="owner" class="pay-lebel">Owner</label>
                                                    <input type="text"  class="form-control"  name="owner" value="{{ old('owner',!empty($A['owner'])?$A['owner']:'') }}" >
                                                    <span id="owner-error" class="error text-red">Please enter owner name</span>
                                                </div>
                                                <div class="form-group CVV col-md-4">
                                                    <label for="cvv" class="pay-lebel">CVV</label>
                                                    <input type="number"  class="form-control" id="cvv" name="cvv" value="{{ old('cvv',!empty($A['cvv'])?$A['cvv']:'') }}">
                                                    <span id="cvv-error" class="error text-red">Please enter cvv</span>
                                                </div>
                                            </div>    
                                            <div class="row">
                                                <div class="form-group col-md-8" id="card-number-field">
                                                    <label for="cardNumber" class="pay-lebel">Card Number</label>
                                                    <input type="text"  class="form-control" id="cardNumber" name="cardNumber" value="{{ old('cardNumber',!empty($A['cardNumber'])?$A['cardNumber']:'') }}">
                                                    <span id="card-error" class="error text-red">Please enter valid card number</span>
                                                </div>
                                                <div class="form-group col-md-4" >
                                                    <label for="amount" class="pay-lebel">Amount</label>
                                                    <input type="number"  class="form-control" id="amount" name="amount" min="1" readOnly value="{{ old('amount',$grandTotal) }}">
                                                    <span id="amount-error" class="error text-red">Please enter amount</span>
                                                </div>
                                            </div>    
                                            <div class="row">
                                                <div class="form-group col-md-6" id="expiration-date">
                                                    <label class="pay-lebel">Expiration Date</label><br/>
                                                    <select class="form-control" id="expiration-month" name="expiration-month" style="float: left; width: 100px; margin-right: 10px;">
                                                        @foreach($months as $k=>$v)
                                                            <option value="{{ $k }}" {{ old('expiration-month') == $k ? 'selected' : '' }}>{{ $v }}</option>                                                        
                                                        @endforeach
                                                    </select>  
                                                    <select class="form-control" id="expiration-year" name="expiration-year"  style="float: left; width: 100px;">
                                                        
                                                        @for($i = date('Y'); $i <= (date('Y') + 15); $i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>            
                                                        @endfor
                                                    </select>
                                                </div>                                                
                                               
                                            </div>
                                            
                                           
    </div>
</div>
