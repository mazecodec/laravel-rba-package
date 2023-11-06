const ThemeType = {
    'light': 'light',
    'dark': 'dark',
    'default': 'system',
}

const ToggleTheme = () => {
    const theme = (() => {
        if(window.localStorage)
        {
            return window.localStorage.getItem('theme') ||ThemeType.default
        }

        return ThemeType.default
    })();


    console.log(theme)

    const setTheme = (theme) => {
        let tempTheme = theme;

        const root = window.document.documentElement
        root.classList.remove('light', 'dark')

        if (tempTheme === 'system') {
            tempTheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
        }

        root.classList.add(tempTheme)

        if (window.localStorage) {
            window.localStorage.setItem('theme', tempTheme)
        }
    }

    const toggle = () => {
        if (theme === ThemeType.light) {
            setTheme(ThemeType.dark)
        } else {
            setTheme(ThemeType.light)
        }
    }

    return {
        theme,
        setTheme,
        toggle
    }
}

export default ToggleTheme
