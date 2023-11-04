import BuyTicket from '@/Components/BuyTicket';
import GuestLayout from '@/Layouts/GuestLayout';
import { Head } from '@inertiajs/react';
function SingleEvent({noOfTickets, eventDetails}) {
  return (
    <GuestLayout>
      <Head title={eventDetails.name} />
          <div className="py-12">
            <div className="max-w-7xl mx-auto sm:px-12 lg:px-8">
              <div className="grid grid-cols-1 gap-4 md:grid-cols-2 mb-10">
                <div>
                  <img
                    className='object-cover'
                    src={eventDetails.image}
                  />
                </div>
                <div>
                  <div className="flex flex-col gap-4 mx-5">
                    <div className="bg-yellow 200">
                      <div className="flex flex-col my-8">
                        <h1 className="text-2xl decoration-3">{eventDetails.name}</h1>
                        <p className="text-lg text-gray-500">{eventDetails.venue}</p>
                      </div>
                    </div>
                    <div className="mb-8">
                      <div className="py-2">
                        <p>{ eventDetails.description }</p>
                      </div>
                    </div>
                  </div>

                </div>
                <div>
                  <div className="py-2">
                    <BuyTicket />
                  </div>
                </div>
              </div>
            </div>
          </div>
    </GuestLayout>
  )
}

export default SingleEvent;