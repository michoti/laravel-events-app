import { useForm } from "@inertiajs/react";
import { useEffect, useState } from "react";
import TextInput from "./TextInput";
import Stepper from "./Stepper";
import StepperControl from "./StepperControl";
import Account from "./steps/Account";
import Complete from "./steps/Complete";
import PersonalDetails from "./steps/PersonalDetails";
import { StepperContext } from "@/contexts/StepperContext";

function BuyTicket() {
    const submit = (e) => {
        e.preventDefault();
        post(route('makepayment'));
    }

    const [currentStep, setCurrentStep] = useState(1)
    const [userData, setUserData] = useState('');
    const [finalData, setFinalData] = useState('');

    const steps = [
        'Account Information',
        'Personal Information',
        'Complete',
    ];

    const displayStep = (step) => {
        switch(step) {
            case 1:
                return <Account />
            case 2:
                return <PersonalDetails />
            case 3:
                return <Complete />
            default:
        }
    }

    const handleClick = (direction) => {
        let newStep = currentStep;

        direction == "next" ? newStep++ : newStep--;

        newStep > 0 && newStep <= steps.length && setCurrentStep(newStep);

    }

  return (
    <div className="p-2">
     <h3 className="text-lg decoration-2">Buy Ticket</h3>
     <div className="md:w-1/2 mx-auto shadow-xl rounded-2xl pb-2 bg-white">
     <div className="container horizontal mt-5">
        <Stepper
          steps={steps}
          currentStep={currentStep}
         />
         <div className='my-10 p-10'>
            <StepperContext.Provider value={{userData,setUserData,finalData,setFinalData}}>
                {displayStep(currentStep)}
            </StepperContext.Provider>
         </div>
     </div>
     <StepperControl
        handleClick={handleClick}
        currentStep={currentStep}
        steps={steps}
      />
     </div>
    </div>
  )
}

export default BuyTicket;