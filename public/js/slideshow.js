class CitiesSlider extends React.Component {
    constructor(props) {
        super(props);

        this.IMAGE_PARTS = 4;

        this.changeTO = null;
        this.AUTOCHANGE_TIME = 4000;

        this.state = { activeSlide: -1, prevSlide: -1, sliderReady: false };
    }

    componentWillUnmount() {
        window.clearTimeout(this.changeTO);
    }

    componentDidMount() {
        this.runAutochangeTO();
        setTimeout(() => {
            this.setState({ activeSlide: 0, sliderReady: true });
        }, 0);
    }

    runAutochangeTO() {
        this.changeTO = setTimeout(() => {
            this.changeSlides(1);
            this.runAutochangeTO();
        }, this.AUTOCHANGE_TIME);
    }

    changeSlides(change) {
        window.clearTimeout(this.changeTO);
        const { length } = this.props.slides;
        const prevSlide = this.state.activeSlide;
        let activeSlide = prevSlide + change;
        if (activeSlide < 0) activeSlide = length - 1;
        if (activeSlide >= length) activeSlide = 0;
        this.setState({ activeSlide, prevSlide });
    }

    render() {
        const { activeSlide, prevSlide, sliderReady } = this.state;
        return /*#__PURE__*/ React.createElement(
            "div",
            {
                className: classNames("slider", { "s--ready": sliderReady }),
            } /*#__PURE__*/,

            React.createElement(
                "div",
                { className: "slider__slides" },
                this.props.slides.map((slide, index /*#__PURE__*/) =>
                    React.createElement(
                        "div",
                        {
                            className: classNames("slider__slide", {
                                "s--active": activeSlide === index,
                                "s--prev": prevSlide === index,
                            }),
                            key: slide.subtitle,
                        } /*#__PURE__*/,

                        React.createElement(
                            "div",
                            {
                                className: "slider__slide-content",
                            } /*#__PURE__*/,
                            React.createElement(
                                "h3",
                                { className: "slider__slide-subheading" },
                                slide.title || slide.subtitle
                            ) /*#__PURE__*/,
                            React.createElement(
                                "h2",
                                { className: "slider__slide-heading" },
                                slide.subtitle.split("").map((l, i) =>
                                    /*#__PURE__*/ React.createElement(
                                        "span",
                                        { key: i }, // Add a key for each element
                                        l === " " ? "\u2002" : l
                                    )
                                )
                            ) /*#__PURE__*/,

                            React.createElement(
                                "a",
                                {
                                    className: "slider__slide-readmore",
                                    href: slide.route,
                                },
                                "read more"
                            )
                        ) /*#__PURE__*/,

                        React.createElement(
                            "div",
                            { className: "slider__slide-parts" },
                            [...Array(this.IMAGE_PARTS).fill()].map(
                                (x, i /*#__PURE__*/) =>
                                    React.createElement(
                                        "div",
                                        {
                                            className: "slider__slide-part",
                                            key: i,
                                        } /*#__PURE__*/,
                                        React.createElement("div", {
                                            className:
                                                "slider__slide-part-inner",
                                            style: {
                                                backgroundImage: `url(${slide.img})`,
                                            },
                                        })
                                    )
                            )
                        )
                    )
                )
            ) /*#__PURE__*/
        );
    }
}

const slides = [];

fetch("/api/slideshow")
    .then((response) => response.json())
    .then((data) => {
        data.forEach((item) => {
            slides.push({
                subtitle: item.title, // Replace with the appropriate data from the API
                title: item.categories,
                img: item.thumbnail,
                route: `/news/${item.id}`,
            });
        });

        // Optionally, you can log the updated `slides` array to see the result
        console.log(slides);

        // If you want to use this data for your slideshow, continue with the logic to render it here
    })
    .catch((error) => console.error("Error fetching slideshow data:", error));

ReactDOM.render(
    /*#__PURE__*/ React.createElement(CitiesSlider, { slides: slides }),
    document.querySelector("#slideshow")
);
