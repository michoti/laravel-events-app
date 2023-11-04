
import Card from '@/Components/Card';
import EventImageSlider from '@/Components/EventImageSlider';
import Hero from '@/Components/Hero';
import GuestLayout from '@/Layouts/GuestLayout';
import { Head,Link,usePage } from '@inertiajs/react';
import { RxDoubleArrowRight } from 'react-icons/rx';

export default function Home() {
    const { events, allCategories, noofeventsimages, eventSliderImages } = usePage().props;

    return (
        <GuestLayout>
            <Head title="Home" />
            <Hero /> 
            <EventImageSlider src={eventSliderImages} />
             <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                      <div className="py-4 flex justify-end">
                            <Link href={route('events')}>
                             <span className='flex items-center justify-center hover:underline-offset-2'>
                                <RxDoubleArrowRight /> View more
                            </span>
                            </Link>
                        </div>
                    <div className='flex md:flex-row items-center justify-center gap-3'>                      
                        {events.data.map((event) => (
                        <div key={event.id}>
                            <Card
                            src={event.image}
                            name={event.name}
                            venue={event.venue}
                            description={event.description} 
                            />
                        </div>
                        ))}
                  </div>                    
                </div>                
            </div>
        </GuestLayout>
    );
}
