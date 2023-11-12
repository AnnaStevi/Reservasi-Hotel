@props(['label','name','type'=>'text'])
<div class="form-group">
     <label><?= $label ?></label>
     <input type="{{ $type }}" name="{{ $name }}" class="form-control"/>
</div>