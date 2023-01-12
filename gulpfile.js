const {src, dest, watch} = require("gulp");
const sass = require("gulp-sass")(require("sass"));

// css
function css(done){
    src("src/scss/**/*.scss") //Identificar 
        .pipe(sass()) //Compilar
        .pipe(dest("public/build/css")); //Almacenarla

    done();
}

//svg
function svg(done){
    src("node_modules/bootstrap-icons/icons/*.svg").pipe(dest("public/build/svg"));

    done();
}

//bootstrap-min.js
function js(done){
    src("node_modules/bootstrap/dist/js/bootstrap.min.js").pipe(dest("public/build/js"));
    
    done();
}

//bootstrap_fonts_font
function fonts(done){
    src("node_module/bootstrap-icons/font/fonts/*.woff").pipe(dest("public/build/css/fonts"));
    src("node_module/bootstrap-icons/font/fonts/*.woff2").pipe(dest("public/build/css/fonts"));
    done();
}

function dev(done){
    watch("src/scss/**/*.scss",css);

    done();
}

exports.css = css;
exports.dev = dev;
exports.svg = svg;
exports.js = js;
exports.fonts = fonts;