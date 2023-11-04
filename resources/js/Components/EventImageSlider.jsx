import { useEffect, useState } from "react";

function EventImageSlider({src}) {
    let images = [...src];

    const [currentImage, setCurrentImage] = useState(0);

    const imagesToShow = images.concat(images.slice(0, 4));

    const nextImage = () => {
        setCurrentImage((currentImage + 1) % images.length);
    };

    const prevImage = () => {
        setCurrentImage((currentImage - 1 + images.length) % images.length);
    };

    useEffect(() => {
        // Automatically transition to the next image every 5 seconds
        const interval = setInterval(nextImage, 5000);

        return () => {
          clearInterval(interval);
        };
    }, [currentImage]);

  return (
    <div className="w-full relative overflow-hidden mt-7">
      <div
        className="flex transition-transform transform translate-x"
        style={{ width: `${images.length * 25}%`, transform: `translateX(-${currentImage * 25 / images.length}%)` }}
      >
        {imagesToShow.map((slider, index) => (
          <div
            key={index}
            className="w-1/3 p-4"
          >
            <img
              alt="slider image"
              src={slider.slider_imagename} 
            />
          </div>
        ))}
      </div>
    </div>
  )
}

export default EventImageSlider;