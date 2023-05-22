<!-- list of categories -->
<label for="options" class="form-label mt-3">Choose the categories:</label>
<div class="checkbox-group border border-secondary rounded p-4 mb-4">
    @foreach($categories as $category)
        <label class="btn btn-outline-secondary btn-rounded mb-2">
            <input type="checkbox" id="{{$category->id }}" value="{{$category->id}}" name="categories[]" class="d-none">
            {{$category->area_name}}
        </label>
    @endforeach           
</div>
@if($errors->has('categories'))
    <p class="text-danger">{{ $errors->first('categories') }}</p>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function() {
      const checkboxGroup = document.querySelector('.checkbox-group');
      const labels = checkboxGroup.querySelectorAll('label');

      labels.forEach(function(label) {
        const checkbox = label.querySelector('input[type="checkbox"]');

        label.addEventListener('click', function() {
          checkbox.checked = !checkbox.checked;

          if (checkbox.checked) {
            label.classList.add('btn-outline-success');
          } else {
            label.classList.remove('btn-outline-success');
          }
        });
        
      });
    });
  </script>