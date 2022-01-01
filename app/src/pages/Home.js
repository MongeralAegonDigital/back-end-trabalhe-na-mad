import React from 'react'
import CssBaseline from '@mui/material/CssBaseline';
import AppBar from '@mui/material/AppBar';
import Box from '@mui/material/Box';
import Container from '@mui/material/Container';
import Toolbar from '@mui/material/Toolbar';
import Paper from '@mui/material/Paper';
import Stepper from '@mui/material/Stepper';
import Step from '@mui/material/Step';
import StepLabel from '@mui/material/StepLabel';
import Button from '@mui/material/Button';
import Typography from '@mui/material/Typography';
import { createTheme, ThemeProvider } from '@mui/material/styles';
import UserForm from './UserForm';
import AddressForm from './AddressForm';
import PersonalData from './PersonalData';
import { useForm } from 'react-hook-form';
import axios from 'axios';
import * as Config from './../config/config'

const steps = ['Dados do Cliente', 'Dados Pessoais', 'Endereço'];

function getStepContent(step, register, errors, setValue, clearErrors) {
    switch (step) {
        case 0:
            return <UserForm register={register} errors={errors} />;
        case 1:
            return <PersonalData register={register} errors={errors} />;
        case 2:
            return <AddressForm register={register} errors={errors} setValue={setValue} clearErrors={clearErrors}/>;
        default:
            throw new Error('Unknown step');
    }
}

const theme = createTheme();

const Home = () => {
    const { register, handleSubmit, clearErrors, setValue, reset, formState: { errors } } = useForm();
    const onSubmit = data => {
        console.log(errors)
        if (Object.keys(errors).length === 0) {
            console.log(data);
            setActiveStep(activeStep + 1);
        }

        if (activeStep === 2) {
            axios
                .post(`${Config.API}/users`, data)
                .then(() => console.log('success'))
                .catch(error => console.log(error));
        }
    };
    const [activeStep, setActiveStep] = React.useState(0);

    const handleNext = () => {
        setActiveStep(activeStep + 1);
    };

    const handleBack = () => {
        setActiveStep(activeStep - 1);
    };

    return (
        <ThemeProvider theme={theme}>
            <CssBaseline />
            <AppBar
                position="absolute"
                color="default"
                elevation={0}
                sx={{
                    position: 'relative',
                    borderBottom: (t) => `1px solid ${t.palette.divider}`,
                }}
            >
                <Toolbar>
                    <Typography variant="h6" color="inherit" noWrap>
                        App
                    </Typography>
                </Toolbar>
            </AppBar>
            <Container component="main" maxWidth="sm" sx={{ mb: 4 }}>
                <Paper variant="outlined" sx={{ my: { xs: 3, md: 6 }, p: { xs: 2, md: 3 } }}>
                    <Typography component="h1" variant="h4" align="center">
                        Trabalhe na Mad
                    </Typography>
                    <Stepper activeStep={activeStep} sx={{ pt: 3, pb: 5 }}>
                        {steps.map((label) => (
                            <Step key={label}>
                                <StepLabel>{label}</StepLabel>
                            </Step>
                        ))}
                    </Stepper>
                    <React.Fragment>
                        {activeStep === steps.length ? (
                            <React.Fragment>
                                <Typography variant="h5" gutterBottom>
                                    Thank you for your order.
                                </Typography>
                                <Typography variant="subtitle1">
                                    Your order number is #2001539. We have emailed your order
                                    confirmation, and will send you an update when your order has
                                    shipped.
                                </Typography>
                                <Button onClick={handleBack} sx={{ mt: 3, ml: 1 }}>
                                    Back
                                </Button>
                            </React.Fragment>
                        ) : (
                            <React.Fragment>
                                <form onSubmit={handleSubmit(onSubmit)}>
                                    {getStepContent(activeStep, register, errors, setValue, clearErrors)}
                                    <Box sx={{ display: 'flex', justifyContent: 'flex-end' }}>
                                        <Button type="submit">Submit</Button>
                                        {activeStep !== 0 && (
                                            <Button onClick={handleBack} sx={{ mt: 3, ml: 1 }}>
                                                Back
                                            </Button>
                                        )}

                                        <Button
                                            variant="contained"
                                            onClick={handleNext}
                                            sx={{ mt: 3, ml: 1 }}
                                        >
                                            {activeStep === steps.length - 1 ? 'Save' : 'Next'}
                                        </Button>
                                    </Box>
                                </form>
                            </React.Fragment>
                        )}
                    </React.Fragment>
                </Paper>
            </Container>
        </ThemeProvider>
    )
}

export default Home
