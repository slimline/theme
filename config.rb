# Require any additional compass plugins here.
add_import_path "bower_components/foundation/scss"

# Set this to the root of your project when deployed:
http_path = "/"
css_dir = "css"
sass_dir = "scss"
images_dir = "img"
javascripts_dir = "js"

# You can select your preferred output style here (can be overridden via the command line):
# output_style = :expanded or :nested or :compact or :compressed
output_style = :compressed

# To enable relative paths to assets via compass helper functions. Uncomment:
# relative_assets = true

# To disable debugging comments that display the original location of your selectors. Uncomment:
line_comments = false

# If you prefer the indented syntax, you might want to regenerate this
# project again passing --syntax sass, or you can uncomment this:
# preferred_syntax = :sass
# and then run:
# sass-convert -R --from scss --to sass sass scss && rm -rf sass && mv scss sass

# Additional handling when saving files
require 'fileutils'

on_stylesheet_saved do |file|

	# append ".min" to filename
	if File.exists?(file)

		filename = File.basename(file, File.extname(file)) + ".min" + File.extname(file)

		# move style.min.css to primary theme folder
		if filename == "style.min.css"
			FileUtils.mv(file, File.dirname(file) + "/../" + filename)

		# rename other files, but don't move them
		else
			File.rename(file, "css" + "/" + filename)

		end #if filename == "style.min.css"

	end # if File.exists?(file)

	# compile expanded stylesheets for debugging
	`compass compile -c config_debug.rb --force`

end # on_stylesheet_saved do |file|