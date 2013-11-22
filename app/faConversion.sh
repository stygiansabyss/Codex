#!/bin/bash
# Font Aweseome really bad conversion script
# Wirtten by: RiDdLeS <riddles@dev-toolbox.com>

# Get files with icon- used in them
grepFiles=$(git grep -l icon- ./);

# Turn the grep files list into an array
fileList=($grepFiles);

# List of icon changes
declare -A changes
changes[icon-large]=REPLACEWITHFA-lg
changes[icon-fixed-width]=REPLACEWITHFA-fw
changes[icon-ban-circle]=REPLACEWITHFA-ban
changes[icon-bar-chart]=REPLACEWITHFA-bar-chart-o
changes[icon-beaker]=REPLACEWITHFA-flask
changes[icon-bell-alt]=REPLACEWITHFA-bell
changes[icon-bell]=REPLACEWITHFA-bell-o
changes[icon-bitbucket-sign]=REPLACEWITHFA-bitbucket-square
changes[icon-bookmark-empty]=REPLACEWITHFA-bookmark-o
changes[icon-building]=REPLACEWITHFA-building-o
changes[icon-calendar-empty]=REPLACEWITHFA-calendar-o
changes[icon-check-empty]=REPLACEWITHFA-square-o
changes[icon-check-minus]=REPLACEWITHFA-minus-square-o
changes[icon-check-sign]=REPLACEWITHFA-check-square
changes[icon-check]=REPLACEWITHFA-check-square-o
changes[icon-chevron-sign-down]=REPLACEWITHFA-chevron-circle-down
changes[icon-chevron-sign-left]=REPLACEWITHFA-chevron-circle-left
changes[icon-chevron-sign-right]=REPLACEWITHFA-chevron-circle-right
changes[icon-chevron-sign-up]=REPLACEWITHFA-chevron-circle-up
changes[icon-circle-arrow-down]=REPLACEWITHFA-arrow-circle-down
changes[icon-circle-arrow-left]=REPLACEWITHFA-arrow-circle-left
changes[icon-circle-arrow-right]=REPLACEWITHFA-arrow-circle-right
changes[icon-circle-arrow-up]=REPLACEWITHFA-arrow-circle-up
changes[icon-circle-blank]=REPLACEWITHFA-circle-o
changes[icon-cny]=REPLACEWITHFA-rub
changes[icon-collapse-alt]=REPLACEWITHFA-collapse-o
changes[icon-collapse-top]=REPLACEWITHFA-caret-square-o-up
changes[icon-collapse]=REPLACEWITHFA-caret-square-o-down
changes[icon-comment-alt]=REPLACEWITHFA-comment-o
changes[icon-comments-alt]=REPLACEWITHFA-comments-o
changes[icon-copy]=REPLACEWITHFA-files-o
changes[icon-cut]=REPLACEWITHFA-scissors
changes[icon-dashboard]=REPLACEWITHFA-tachometer
changes[icon-double-angle-down]=REPLACEWITHFA-angle-double-down
changes[icon-double-angle-left]=REPLACEWITHFA-angle-double-left
changes[icon-double-angle-right]=REPLACEWITHFA-angle-double-right
changes[icon-double-angle-up]=REPLACEWITHFA-angle-double-up
changes[icon-download-alt]=REPLACEWITHFA-download
changes[icon-download]=REPLACEWITHFA-arrow-circle-o-down
changes[icon-edit-sign]=REPLACEWITHFA-pencil-square
changes[icon-edit]=REPLACEWITHFA-pencil-square-o
changes[icon-ellipsis-horizontal]=REPLACEWITHFA-ellipsis-h
changes[icon-ellipsis-vertical]=REPLACEWITHFA-ellipsis-v
changes[icon-envelope-alt]=REPLACEWITHFA-envelope-o
changes[icon-exclamation-sign]=REPLACEWITHFA-exclamation-circle
changes[icon-expand-alt]=REPLACEWITHFA-expand-o
changes[icon-expand]=REPLACEWITHFA-caret-square-o-right
changes[icon-external-link-sign]=REPLACEWITHFA-external-link-square
changes[icon-eye-close]=REPLACEWITHFA-eye-slash
changes[icon-eye-open]=REPLACEWITHFA-eye
changes[icon-facebook-sign]=REPLACEWITHFA-facebook-square
changes[icon-facetime-video]=REPLACEWITHFA-video-camera
changes[icon-file-alt]=REPLACEWITHFA-file-o
changes[icon-file-text-alt]=REPLACEWITHFA-file-text-o
changes[icon-flag-alt]=REPLACEWITHFA-flag-o
changes[icon-folder-close-alt]=REPLACEWITHFA-folder-o
changes[icon-folder-close]=REPLACEWITHFA-folder
changes[icon-folder-open-alt]=REPLACEWITHFA-folder-open-o
changes[icon-food]=REPLACEWITHFA-cutlery
changes[icon-frown]=REPLACEWITHFA-frown-o
changes[icon-fullscreen]=REPLACEWITHFA-arrows-alt
changes[icon-github-sign]=REPLACEWITHFA-github-square
changes[icon-google-plus-sign]=REPLACEWITHFA-google-plus-square
changes[icon-group]=REPLACEWITHFA-users
changes[icon-h-sign]=REPLACEWITHFA-h-square
changes[icon-hand-down]=REPLACEWITHFA-hand-o-down
changes[icon-hand-left]=REPLACEWITHFA-hand-o-left
changes[icon-hand-right]=REPLACEWITHFA-hand-o-right
changes[icon-hand-up]=REPLACEWITHFA-hand-o-up
changes[icon-hdd]=REPLACEWITHFA-hdd-o
changes[icon-heart-empty]=REPLACEWITHFA-heart-o
changes[icon-hospital]=REPLACEWITHFA-hospital-o
changes[icon-indent-left]=REPLACEWITHFA-outdent
changes[icon-indent-right]=REPLACEWITHFA-indent
changes[icon-info-sign]=REPLACEWITHFA-info-circle
changes[icon-keyboard]=REPLACEWITHFA-keyboard-o
changes[icon-legal]=REPLACEWITHFA-gavel
changes[icon-lemon]=REPLACEWITHFA-lemon-o
changes[icon-lightbulb]=REPLACEWITHFA-lightbulb-o
changes[icon-linkedin-sign]=REPLACEWITHFA-linkedin-square
changes[icon-meh]=REPLACEWITHFA-meh-o
changes[icon-microphone-off]=REPLACEWITHFA-microphone-slash
changes[icon-minus-sign-alt]=REPLACEWITHFA-minus-square
changes[icon-minus-sign]=REPLACEWITHFA-minus-circle
changes[icon-mobile-phone]=REPLACEWITHFA-mobile
changes[icon-moon]=REPLACEWITHFA-moon-o
changes[icon-move]=REPLACEWITHFA-arrows
changes[icon-off]=REPLACEWITHFA-power-off
changes[icon-ok-circle]=REPLACEWITHFA-check-circle-o
changes[icon-ok-sign]=REPLACEWITHFA-check-circle
changes[icon-ok]=REPLACEWITHFA-check
changes[icon-paper-clip]=REPLACEWITHFA-paperclip
changes[icon-paste]=REPLACEWITHFA-clipboard
changes[icon-phone-sign]=REPLACEWITHFA-phone-square
changes[icon-picture]=REPLACEWITHFA-picture-o
changes[icon-pinterest-sign]=REPLACEWITHFA-pinterest-square
changes[icon-play-circle]=REPLACEWITHFA-play-circle-o
changes[icon-play-sign]=REPLACEWITHFA-play-circle
changes[icon-plus-sign-alt]=REPLACEWITHFA-plus-square
changes[icon-plus-sign]=REPLACEWITHFA-plus-circle
changes[icon-pushpin]=REPLACEWITHFA-thumb-tack
changes[icon-question-sign]=REPLACEWITHFA-question-circle
changes[icon-remove-circle]=REPLACEWITHFA-times-circle-o
changes[icon-remove-sign]=REPLACEWITHFA-times-circle
changes[icon-remove]=REPLACEWITHFA-times
changes[icon-reorder]=REPLACEWITHFA-bars
changes[icon-resize-full]=REPLACEWITHFA-expand
changes[icon-resize-horizontal]=REPLACEWITHFA-arrows-h
changes[icon-resize-small]=REPLACEWITHFA-compress
changes[icon-resize-vertical]=REPLACEWITHFA-arrows-v
changes[icon-rss-sign]=REPLACEWITHFA-rss-square
changes[icon-save]=REPLACEWITHFA-floppy-o
changes[icon-screenshot]=REPLACEWITHFA-crosshairs
changes[icon-share-alt]=REPLACEWITHFA-share
changes[icon-share-sign]=REPLACEWITHFA-share-square
changes[icon-share]=REPLACEWITHFA-share-square-o
changes[icon-sign-blank]=REPLACEWITHFA-square
changes[icon-signin]=REPLACEWITHFA-sign-in
changes[icon-signout]=REPLACEWITHFA-sign-out
changes[icon-smile]=REPLACEWITHFA-smile-o
changes[icon-sort-by-alphabet-alt]=REPLACEWITHFA-sort-alpha-desc
changes[icon-sort-by-alphabet]=REPLACEWITHFA-sort-alpha-asc
changes[icon-sort-by-attributes-alt]=REPLACEWITHFA-sort-amount-desc
changes[icon-sort-by-attributes]=REPLACEWITHFA-sort-amount-asc
changes[icon-sort-by-order-alt]=REPLACEWITHFA-sort-numeric-desc
changes[icon-sort-by-order]=REPLACEWITHFA-sort-numeric-asc
changes[icon-sort-down]=REPLACEWITHFA-sort-asc
changes[icon-sort-up]=REPLACEWITHFA-sort-desc
changes[icon-stackexchange]=REPLACEWITHFA-stack-overflow
changes[icon-star-empty]=REPLACEWITHFA-star-o
changes[icon-star-half-empty]=REPLACEWITHFA-star-half-o
changes[icon-sun]=REPLACEWITHFA-sun-o
changes[icon-thumbs-down-alt]=REPLACEWITHFA-thumbs-o-down
changes[icon-thumbs-up-alt]=REPLACEWITHFA-thumbs-o-up
changes[icon-time]=REPLACEWITHFA-clock-o
changes[icon-trash]=REPLACEWITHFA-trash-o
changes[icon-tumblr-sign]=REPLACEWITHFA-tumblr-square
changes[icon-twitter-sign]=REPLACEWITHFA-twitter-square
changes[icon-unlink]=REPLACEWITHFA-chain-broken
changes[icon-upload-alt]=REPLACEWITHFA-upload
changes[icon-upload]=REPLACEWITHFA-arrow-circle-o-up
changes[icon-warning-sign]=REPLACEWITHFA-exclamation-triangle
changes[icon-xing-sign]=REPLACEWITHFA-xing-square
changes[icon-youtube-sign]=REPLACEWITHFA-youtube-square
changes[icon-zoom-in]=REPLACEWITHFA-search-plus
changes[icon-zoom-out]=REPLACEWITHFA-search-minus

# echo ${changes[@]}
# echo ${!changes[@]}


for (( i = 0; i < ${#fileList[@]}; i++ )); do
	file=${fileList[$i]};

	if git grep -q -E 'icon-large|icon-fixed-width|icon-ban-circle|icon-bar-chart|icon-beaker|icon-bell-alt|icon-bell|icon-bitbucket-sign|icon-bookmark-empty|icon-building|icon-calendar-empty|icon-check-empty|icon-check-minus|icon-check-sign|icon-check|icon-chevron-sign-down|icon-chevron-sign-left|icon-chevron-sign-right|icon-chevron-sign-up|icon-circle-arrow-down|icon-circle-arrow-left|icon-circle-arrow-right|icon-circle-arrow-up|icon-circle-blank|icon-cny|icon-collapse-alt|icon-collapse-top|icon-collapse|icon-comment-alt|icon-comments-alt|icon-copy|icon-cut|icon-dashboard|icon-double-angle-down|icon-double-angle-left|icon-double-angle-right|icon-double-angle-up|icon-download-alt|icon-download|icon-edit-sign|icon-edit|icon-ellipsis-horizontal|icon-ellipsis-vertical|icon-envelope-alt|icon-exclamation-sign|icon-expand-alt|icon-expand|icon-external-link-sign|icon-eye-close|icon-eye-open|icon-facebook-sign|icon-facetime-video|icon-file-alt|icon-file-text-alt|icon-flag-alt|icon-folder-close-alt|icon-folder-close|icon-folder-open-alt|icon-food|icon-frown|icon-fullscreen|icon-github-sign|icon-google-plus-sign|icon-group|icon-h-sign|icon-hand-down|icon-hand-left|icon-hand-right|icon-hand-up|icon-hdd|icon-heart-empty|icon-hospital|icon-indent-left|icon-indent-right|icon-info-sign|icon-keyboard|icon-legal|icon-lemon|icon-lightbulb|icon-linkedin-sign|icon-meh|icon-microphone-off|icon-minus-sign-alt|icon-minus-sign|icon-mobile-phone|icon-moon|icon-move|icon-off|icon-ok-circle|icon-ok-sign|icon-ok|icon-paper-clip|icon-paste|icon-phone-sign|icon-picture|icon-pinterest-sign|icon-play-circle|icon-play-sign|icon-plus-sign-alt|icon-plus-sign|icon-pushpin|icon-question-sign|icon-remove-circle|icon-remove-sign|icon-remove|icon-reorder|icon-resize-full|icon-resize-horizontal|icon-resize-small|icon-resize-vertical|icon-rss-sign|icon-save|icon-screenshot|icon-share-alt|icon-share-sign|icon-share|icon-sign-blank|icon-signin|icon-signout|icon-smile|icon-sort-by-alphabet-alt|icon-sort-by-alphabet|icon-sort-by-attributes-alt|icon-sort-by-attributes|icon-sort-by-order-alt|icon-sort-by-order|icon-sort-down|icon-sort-up|icon-stackexchange|icon-star-empty|icon-star-half-empty|icon-sun|icon-thumbs-down-alt|icon-thumbs-up-alt|icon-time|icon-trash|icon-tumblr-sign|icon-twitter-sign|icon-unlink|icon-upload-alt|icon-upload|icon-warning-sign|icon-xing-sign|icon-youtube-sign|icon-zoom-in|icon-zoom-out' $file; then
		for i in "${!changes[@]}"
		do
			sed -i "s/$i/${changes[$i]}/g" $file
		done
	fi

	sed -i 's/REPLACEWITHFA/fa fa/g' $file
	sed -i 's/ icon-spin/ fa-spin/g' $file # bug fix for spin icon
	sed -i 's/-alt/ fa-inverse/g' $file # Alt replaced with inverse
	sed -i "s/.toggleClass('fa fa/.toggleClass('fa/g" $file # bug fix for toggle class
	sed -i "s/fa fa-share-square-o fa-inverse').addClass('fa fa/fa-share-square-o').addClass('fa/g" $file # bug fix for toggle class 2
	sed -i "s/fa fa-share-square-o fa-inverse').removeClass('fa fa/fa-share-square-o').removeClass('fa/g" $file # bug fix for toggle class 3
	sed -i 's/icon-/fa fa-/g' $file



	# icon-large to fa-lg
	# if git grep -q 'icon-large' $file; then
	# 	sed -i 's/icon-large/fa-lg/g' $file
	# fi

done


# echo ${fileList[2]};
