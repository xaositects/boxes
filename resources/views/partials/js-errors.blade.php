@if(count($errors))
<script type="text/javascript">
    @foreach ($errors->all() as $error)
        Msg('{{ $error }}');
    @endforeach
</script>
@endif
