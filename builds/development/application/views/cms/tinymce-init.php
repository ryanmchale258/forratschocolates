<script type="text/javascript">
tinymce.init({
    selector: "textarea.richtext",
    menubar : false,
    height: 400,
    toolbar: "undo redo | bold italic | alignleft aligncenter alignright alignjustify | fontsizeselect | bullist numlist | link image | code",
    external_plugins: {
        "code": "<?php echo base_url(); ?>js/vendor/tiny_mce/plugins/code/plugin.min.js",
        "image": "<?php echo base_url(); ?>js/vendor/tiny_mce/plugins/image/plugin.min.js",
        "link": "<?php echo base_url(); ?>js/vendor/tiny_mce/plugins/link/plugin.min.js"
    },
    image_class_list: [
        {title: 'None', value: 'imgNoAlign'},
        {title: 'Align Left', value: 'imgLeft'},
        {title: 'Align Right', value: 'imgRight'}
    ]
 });
</script>