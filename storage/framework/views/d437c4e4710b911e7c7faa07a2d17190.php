<?php if($name): ?><p class="text-red-600 text-sm mt-2 font-sans" v-if="form.hasError(<?php echo \Illuminate\Support\Js::from($name)->toHtml() ?>)" v-bind="form.$errorAttributes(<?php echo \Illuminate\Support\Js::from($name)->toHtml() ?>)" /><?php endif; ?><?php /**PATH /home/yoshito/Projects/pio/vendor/protonemedia/laravel-splade/src/../resources/views/form/error.blade.php ENDPATH**/ ?>