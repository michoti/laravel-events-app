import { Link } from "@inertiajs/react";

const Card = ({id,name, venue, src, description}) => {
  return (
    <div className="max-w-xs mx-2 h-[20rem]">
      <Link href={`/events/${id}`}>
      <div className="rounded overflow-hidden shadow-lg">
        <img src={src} alt={`img-${name}`} className="w-full" />
        <div className="px-6 py-4">
          <div className="font-bold text-xl mb-2">{name}</div>
          <div className="font-bold text-xs mb-2">{venue}</div>

        </div>
      </div>
      </Link>
    </div>
  );
};

export default Card;
