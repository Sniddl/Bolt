<script src="/js/sniddl.ajax.js" charset="utf-8"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" defer></script>
<script src="js/material.min.js"></script>
<script src="js/bolt.js" defer></script>
<script type="text/javascript">
  window.__SNIDDL_AJAX__ = {
    data: {!! json_encode([
        '_token' => csrf_token(),
    ]) !!}
  };
</script>
