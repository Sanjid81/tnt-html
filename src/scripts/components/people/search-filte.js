jQuery(function($){

    // debounce helper
    function debounce(fn, delay){
        let t;
        return function(){
            clearTimeout(t);
            let args = arguments;
            t = setTimeout(function(){ fn.apply(null, args); }, delay);
        };
    }

    function loadTeamMembers() {
        let search = $('.search-field input').val() || '';
        let category = $('.select-field select').val() || '';

        console.log('[team-filter] sending AJAX', { search: search, category: category });

        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'filter_team_members',
                search: search,
                category: category
            },
            beforeSend: function(){
                $('.team-members').html('<p>Loading...</p>');
            },
            success: function(response){
                console.log('[team-filter] success response', response);

                if (!response || typeof response.html === 'undefined') {
                    console.error('[team-filter] invalid response format', response);
                    $('.team-members').html('<p>Unexpected response from server.</p>');
                    return;
                }

                $('.team-members').html(response.html);
                $('.category-tag-content').text(response.category_tag || 'All Team Members');
            },
            error: function(jqXHR, textStatus, errorThrown){
                console.error('[team-filter] ajax error', textStatus, errorThrown, jqXHR.responseText);
                $('.team-members').html('<p>AJAX error. Check console/network.</p>');
            }
        });
    }

    // debounced version for keyup
    const debouncedLoad = debounce(loadTeamMembers, 250);

    // triggers
    $(document).on('keyup', '.search-field input', debouncedLoad);
    $(document).on('change', '.select-field select', loadTeamMembers);

    // optional: trigger initial load (comment out if you want initial blank)
    // loadTeamMembers();
});
