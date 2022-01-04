import React from 'react'
import Grid from '@mui/material/Grid';
import Typography from '@mui/material/Typography';
import TextField from '@mui/material/TextField';
import axios from 'axios';
import * as Config from './../config/config'
import { Box } from '@mui/material';

const AddressForm = ({ register, setValue, errors, clearErrors }) => {

    const getAddress = cep => {
        axios
            .get(`${Config.API}/cep/getAddress/${cep}`)
            .then(resp => {
                const { data } = resp;
                setValue('address.public_area', data.logradouro);
                clearErrors('address.public_area');

                setValue('address.district', data.bairro);
                clearErrors('address.district');

                setValue('address.city', data.cidade);
                clearErrors('address.city');

                setValue('address.state', data.estado);
                clearErrors('address.state');
            })
            .catch(error => {
                console.log(error);
            });
    }

    return (
        <React.Fragment>
            <Typography variant="h6" gutterBottom>
                Endereço
            </Typography>
            <Grid container spacing={3}>
                <Grid item xs={12}>
                    <TextField
                        error={errors.address && errors.address.cep ? true : false}
                        id="cep"
                        name="cep"
                        label="CEP"
                        fullWidth
                        autoComplete="shipping address-line1"
                        variant="standard"
                        InputLabelProps={{
                            shrink: true,
                        }}
                        {...register('address.cep', { required: true, maxLength: 11 })}
                        type="number"
                        onBlur={e => getAddress(e.target.value)}
                    />
                    {errors.address && errors.address.cep && errors.address.cep.type === "required" && <Box component="div" sx={{ color: 'red' }}>{Config.requiredMessage('O CEP')}</Box>}
                </Grid>
                <Grid item xs={12} sm={6}>
                    <TextField
                        error={errors.address && errors.address.public_area ? true : false}
                        disabled
                        id="public_area"
                        name="public_area"
                        label="Logradouro"
                        fullWidth
                        autoComplete="shipping address-line2"
                        variant="standard"
                        InputLabelProps={{
                            shrink: true,
                        }}
                        {...register('address.public_area', { required: true })}
                    />
                    {errors.address && errors.address.public_area && errors.address.public_area.type === "required" && <Box component="div" sx={{ color: 'red' }}>{Config.requiredMessage('O Logradouro')}</Box>}
                </Grid>
                <Grid item xs={12} sm={6}>
                    <TextField
                        error={errors.address && errors.address.district ? true : false}
                        disabled
                        id="district"
                        name="district"
                        label="Bairro"
                        fullWidth
                        autoComplete="shipping address-line1"
                        variant="standard"
                        InputLabelProps={{
                            shrink: true,
                        }}
                        {...register('address.district', { required: true })}
                    />
                    {errors.address && errors.address.district && errors.address.district.type === "required" && <Box component="div" sx={{ color: 'red' }}>{Config.requiredMessage('O Bairro')}</Box>}
                </Grid>
                <Grid item xs={12} sm={6}>
                    <TextField
                        error={errors.address && errors.address.number ? true : false}
                        id="number"
                        name="number"
                        label="Numero"
                        fullWidth
                        autoComplete="shipping address-line1"
                        variant="standard"
                        type="number"
                        {...register('address.number', { required: true })}
                    />
                    {errors.address && errors.address.number && errors.address.number.type === "required" && <Box component="div" sx={{ color: 'red' }}>{Config.requiredMessage('O Número')}</Box>}
                </Grid>

                <Grid item xs={12} sm={6}>
                    <TextField
                        error={errors.address && errors.address.complement ? true : false}
                        id="complement"
                        name="complement"
                        label="Complemento"
                        fullWidth
                        autoComplete="shipping address-line2"
                        variant="standard"
                        {...register('address.complement', { required: true })}
                    />
                    {errors.address && errors.address.complement && errors.address.complement.type === "required" && <Box component="div" sx={{ color: 'red' }}>{Config.requiredMessage('O Complemento')}</Box>}
                </Grid>

                <Grid item xs={12} sm={6}>
                    <TextField
                        error={errors.address && errors.address.city ? true : false}
                        disabled
                        id="city"
                        name="city"
                        label="Cidade"
                        fullWidth
                        autoComplete="shipping address-line2"
                        variant="standard"
                        InputLabelProps={{
                            shrink: true,
                        }}
                        {...register('address.city', { required: true })}
                    />
                    {errors.address && errors.address.city && errors.address.city.type === "required" && <Box component="div" sx={{ color: 'red' }}>{Config.requiredMessage('A cidade')}</Box>}
                </Grid>
                <Grid item xs={12} sm={6}>
                    <TextField
                        error={errors.address && errors.address.state ? true : false}
                        disabled
                        id="state"
                        name="state"
                        label="Estado"
                        fullWidth
                        autoComplete="shipping address-line2"
                        variant="standard"
                        InputLabelProps={{
                            shrink: true,
                        }}
                        {...register('address.state', { required: true })}
                    />
                    {errors.address && errors.address.state && errors.address.state.type === "required" && <Box component="div" sx={{ color: 'red' }}>{Config.requiredMessage('A estado')}</Box>}
                </Grid>
            </Grid>
        </React.Fragment>
    )
}

export default AddressForm
