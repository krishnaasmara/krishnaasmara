module.exports = {
    important: true,
    purge: {
        content: ["./app/**/*.php", "./resources/**/*.{php,vue,js}", "./node_modules/flowbite/**/*.js"],
       
    },
    darkMode: false, // or 'media' or 'class'
    theme: {
        container: {
            padding: {
                DEFAULT: '2rem',
                sm: '2.5rem',
                lg: '4rem',
                xl: '5rem',
                '2xl': '5.5rem',
            },
            center: true,
        },
        fontFamily: {
            // display: "Poppins",
            display: "Poppins",
            default: "'Poppins'"
        },
        extend: {
            colors: {
                white: "#fff",
                black: "#1f201c",
                primary: "#3EC1D3",
                secondary: "#0A111C",
                "primary-gray": "#A1A1A1",
                "primary-gray-1": "#C4C4C4",
                "primary-gray-2": "#E3E3E3",
                "primary-orange" : "#EF8138;",
                
                "black-dark": "#727272",
                "black-dark-1": "#E7E7E7",
                "white-secondary": "#F7F7F7",
                "blue-light": "#A1DCE4",
                "blue-dark": "#136478",
                "yellow-light": "#FCEEBD",
                "yellow-dark": "#525018",
                "purple-light": "#C4C3F6",
                "purple-dark": "#57559D",
                "red-light": "#F3B6BE",
                "red-dark": "#771522",

                "black-dark-2": "#383838",
                "black-line": "#323232",

                themeGray: "#808080",
                "DARK": "#0A111C",
                "high-dark": "#646464",
                "medium-dark": "#969696",
                "medium": "#D8D8D8",
                "medium-light": "#E4E4E4",
                "bg_mobile_menu_sosial_media" : "#E6E6E6",
                "light": "#F4F4F4",
                "red": "#E25B5B",
                "themeGreen": "#BEE989",
                "border-light-color": "#D8D8D8",
                "mobile_nav_background": "#2F2F2F",
                "light-grey": "C4C4C4",
                "red-medium": "#E63D3D",
            },
            gridTemplateRows: {
                "8": "repeat(8, minmax(0, 1fr))",
            },
            screens: {
                sm: "640px",
                md: "768px",
                lg: "1024px",
                xl: "1280px",
            },
            fontSize: {
                h1: "3.5rem", //64px
                h2: "3rem", //48px
                h3: "2.5rem", //40px
                h4: "2rem", //32px
                h5: "1.75rem", //28px
                h6: "1.5rem", //24px
                h7: "1.25rem", //20px
                p1: "1.125rem", //18px
                p2: "1rem", //16px
                p3: "0.875rem", //14px
                p4: "0.75rem", //12px
                "55px": "3.438rem",
                '8px': '0.5rem',
                "36px": "2.25rem" 
            },
            height: {
                "90vh": "90vh",
                "80vh": "80vh",
                "70vh": "70vh",
                "60vh": "60vh",
                "50vh": "50vh",
                "40vh": "40vh",
                "20.5": "20.673rem",
                size40rem: "40rem",
                "672px": "672px",
            },
            padding: {
                '8px': '0.5rem',
                '36px': '2.25rem',
            },

            spacing: {
                "1/2": "50%",
                "1/3": "33.333333%",
                "2/3": "66.666667%",
                "1/4": "25%",
                "2/4": "50%",
                "3/4": "75%",
                "1/5": "20%",
                "2/5": "40%",
                "3/5": "60%",
                "4/5": "80%",
                "1/6": "16.666667%",
                "2/6": "33.333333%",
                "3/6": "50%",
                "4/6": "66.666667%",
                "5/6": "83.333333%",
                "1/12": "8.333333%",
                "2/12": "16.666667%",
                "3/12": "25%",
                "4/12": "33.333333%",
                "5/12": "41.666667%",
                "6/12": "50%",
                "7/12": "58.333333%",
                "8/12": "66.666667%",
                "9/12": "75%",
                "10/12": "83.333333%",
                "11/12": "91.666667%",
                "150px": "150px",

                "20%": "20%",
                "25%": "25%",
                "30%": "30%",
                "60%": "60%",
                "70%": "70%",
            },
            lineHeight: {
                "28px": "28px"
            },
            margin: {
                "5px": "0.313rem",
                "10px": "0.625rem"
            },
            fontWeight: {
                semibold: 600,
            }
        },
    },
    extend: {},
    plugins: [
        require('flowbite/plugin')
    ],
};