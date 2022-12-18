$(function () {
    $(document).on('click', '.add_tag', function() {
        let template = $(this).closest('.tag_content').clone();
        template.children('.add_tag, .remove_tag').toggleClass('hidden');

        template.find('input').val('');

        let input = template.find('input[name*=name]');
        const prev_tag_number = $('.tag_content').last().find('input[name*=name]').attr('name').match(/(?<=\[).*?(?=\])/)[0];
        let new_tag_name = input.attr('name').replace(/(\[\d+\])/, `[${Number(prev_tag_number) + 1}]`);
        input.attr('name', new_tag_name);

        $('#tag').append(template);
    });
  
    $(document).on('click', '.remove_tag', function() {
        $(this).closest('.tag_content').remove();
    });
});